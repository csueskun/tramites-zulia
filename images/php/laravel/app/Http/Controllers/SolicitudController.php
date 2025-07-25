<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Documento;
use App\Models\Tramite;
use App\Services\MailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    protected $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function userIndex()
    {
        $tramites = Tramite::all();
        return view('user-home', compact('tramites'));
    }
    public function nuevaIndex($tramite_id, $vehiculo = 'TODOS', $persona = 'TODOS')
    {
        $tramite = Tramite::findOrFail($tramite_id);
        return view('solicitudes.nueva', compact('tramite', 'vehiculo', 'persona'));
    }
    public function nuevaPost(Request $request)
    {
        $input = $request->all();
        return redirect()->route('user.solicitudes.nueva', [
            'tramite_id' => $input['tramite_id'],
            'vehiculo' => $input['vehiculo'],
            'persona' => $input['persona'],
        ]);
    }

    /**
     * Retrieve solicitudes by status.
     */
    public function indexByStatus($estado)
    {
        $solicitudes = Solicitud::where('estado', $estado)->get();
        return response()->json($solicitudes);
    }

    /**
     * Retrieve solicitudes by status with pagination and query.
     */
    public function getSolicitudesByStatusPaginated($estados, $request, $has_document = '')
    {

        $current_page = $request->query('page', 1);
        if($estados === 'TODOS') {
            $estados = ['EN REVISION', 'APROBADA', 'RECHAZADA', 'VALIDADA', 'COMPLETADA'];
        }
        $solicitudesQuery = Solicitud::whereIn('estado', $estados);
        $query = $this->getQueryFromRequest($request);

        if($request->query('usuario_id', null)){
            $solicitudesQuery->where('usuario_id', $request->query('usuario_id'));
        }

        if($query['tramite'] ?? null) {
            $solicitudesQuery->whereHas('tramite', function ($q) use ($query) {
                $q->where('nombre', 'like', "%{$query['tramite']}%");
            });
        }
        if($query['radicado'] ?? null) {
            $solicitudesQuery->where('radicado', 'like', "%{$query['radicado']}%");
        }
        if($query['nombres'] ?? null) {
            $solicitudesQuery->where('nombres', 'like', "%{$query['nombres']}%");
        }
        if ($has_document) {
            $solicitudesQuery->whereHas('documentos', function ($q) use ($has_document) {
                $q->where('tipo', $has_document);
            });
        }
        $perPage = $request->query('per_page', 10);
        $solicitudes = $solicitudesQuery->paginate($perPage, ['*'], 'page', $current_page);

        if ($solicitudes->isEmpty() && $current_page > 1) {
            $lastPage = $solicitudes->lastPage();
            $solicitudes = $solicitudesQuery->paginate($perPage, ['*'], 'page', $lastPage);
        }

        return $solicitudes;
    }

    /**
     * Display the pendientes view.
     */
    public function viewPendientes(Request $request)
    {
        $solicitudes = $this->getSolicitudesByStatusPaginated(['EN REVISION'], $request);
        return view('solicitudes.pendientes', compact('solicitudes'));
    }
    public function viewConsolidadas(Request $request)
    {
        $solicitudes = $this->getSolicitudesByStatusPaginated(['APROBADA', 'RECHAZADA'], $request);
        return view('solicitudes.consolidadas', compact('solicitudes'));
    }
    public function viewAceptadas(Request $request)
    {
        $solicitudes = $this->getSolicitudesByStatusPaginated(['APROBADA'], $request);
        return view('solicitudes.aceptadas', compact('solicitudes'));
    }
    public function viewPagadas(Request $request)
    {
        $solicitudes = $this->getSolicitudesByStatusPaginated(['APROBADA', 'VALIDADA'], $request, 'CONSTANCIA DE PAGO');
        return view('solicitudes.pagadas', compact('solicitudes'));
    }
    public function viewCompletas(Request $request)
    {
        $solicitudes = $this->getSolicitudesByStatusPaginated(['VALIDADA', 'COMPLETADA'], $request, );
        return view('solicitudes.completadas', compact('solicitudes'));
    }

    private function getQueryFromRequest(Request $request)
    {
        $q = [];
        if($request->query('filter_by', null) && $request->query('search', null)) {
            $q[$request->query('filter_by')] = $request->query('search');
        }
        return $q;
    }

    /**
     * Update the specified solicitud.
     */
    public function patchFromView(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->update($request->all());
        if ($solicitud->estado == 'APROBADA') {
            $solicitud->update(['fecha_aprobacion' => now()]);
            $this->mailService->sendSolicitudAceptada($solicitud, $solicitud->comentarios);
        }
        if ($solicitud->estado == 'RECHAZADA') {
            $comentario = $request->input('comentario', 'No se proporcionó un motivo.');
            $solicitud->comentarios()->create([
                'comentario' => $comentario,
                'autor' => 'ADMIN',
            ]);
            $this->mailService->sendSolicitudRechazada($solicitud, $comentario);
        }
        if ($solicitud->estado == 'VALIDADA') {
            $solicitud->update(['fecha_validacion' => now()]);
            $this->mailService->sendPagoValidado($solicitud);
        }
        return redirect()->back()->with('success', 'Solicitud actualizada exitosamente.');
    }
    public function mailReciboDePago(Request $request, Solicitud $solicitud)
    {
        try {
            $fileName = $solicitud->radicado . '-recibo-de-pago.pdf';
            $responsable = $request->input('responsable', 'ADMIN');
            $solicitud->documentos()->create([
                'tipo' => 'RECIBO DE PAGO',
                'responsable' => $responsable,
                'ruta' => '/' . $fileName,
            ]);
            if ($responsable == 'TNS') {
                $solicitud->documentos()->create([
                    'tipo' => 'CONSTANCIA DE PAGO',
                    'responsable' => $responsable,
                    'ruta' => '/' . $solicitud->radicado . '-constancia-de-pago.pdf',
                ]);
                $solicitud->comentarios()->create([
                    'comentario' => "En su dirección de correo {$solicitud->usuario->email}, recibirá el soporte de pago para el trámite.",
                    'autor' => 'ADMIN',
                ]);
            } else {
                if ($request->hasFile('file_recibo')) {
                    $file = $request->file('file_recibo');
                    $file[0]->storeAs('uploads', $fileName, 'public');
                }
                $this->mailService->sendReciboDePago($solicitud, 'app/public/uploads/' . $fileName);
            }
            $solicitud->update(['link_pago' => $request->input('link_pago', null)]);
            return redirect()->back()->with('success', 'Soporte de pago enviado.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error al enviar el recibo de pago: ' . $e->getMessage()]);
        }
    }
    public function mailCertificado(Request $request, $id)
    {
        try {
            $solicitud = Solicitud::findOrFail($id);
            $fileName = $solicitud->radicado . '-certificado.pdf';
            if ($request->hasFile('file_certificado')) {
                $file = $request->file('file_certificado');
                $file[0]->storeAs('uploads', $fileName, 'public');
            }
            $this->mailService->sendCertificado($solicitud, 'app/public/uploads/' . $fileName);
            $solicitud->documentos()->create([
                'tipo' => 'CERTIFICADO',
                'responsable' => 'ADMIN',
                'ruta' => '/' . $fileName,
            ]);
            $solicitud->update(['estado' => 'COMPLETADA']);
            return redirect()->back()->with('success', 'Certificado enviado.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error al enviar el certificado: ' . $e->getMessage()]);
        }
    }
    public function mailSolicitudCompletada(Request $request, Solicitud $solicitud)
    {
        $this->mailService->mailSolicitudCompletada($solicitud);
        $solicitud->comentarios()->create([
            'comentario' => "El proceso de solicitud terminó correctamente. Por favor preséntese en la secretaria de tránsito sede operativa del municipio El Zulia.",
            'autor' => 'ADMIN',
        ]);
        $solicitud->update(['estado' => 'COMPLETADA']);
        return redirect()->back()->with('success', 'Usuario notificado.');
    }

    public function mailCupl(Request $request, Solicitud $solicitud)
    {
        try {
            $fileName = $solicitud->radicado . '-cupl.pdf';
            if ($request->hasFile('file_cupl')) {
                $file = $request->file('file_cupl');
                $file[0]->storeAs('uploads', $fileName, 'public');
            }
            $this->mailService->sendCupl($solicitud, 'app/public/uploads/' . $fileName);
            $solicitud->documentos()->create([
                'tipo' => 'CUPL',
                'responsable' => 'ADMIN',
                'ruta' => '/' . $fileName,
            ],);
            $solicitud->documentos()->create([
                'tipo' => 'RECIBO DE PAGO',
                'responsable' => "TNS",
                'ruta' => '/' . $solicitud->radicado . '-recibo-de-pago.pdf',
            ]);
            $solicitud->documentos()->create([
                'tipo' => 'CONSTANCIA DE PAGO',
                'responsable' => 'ADMIN',
                'ruta' => '/' . $solicitud->radicado . '-constancia-de-pago.pdf',
            ]);
            $solicitud->comentarios()->create([
                'comentario' => "En su dirección de correo {$solicitud->usuario->email}, recibirá dos soportes de pago, uno para el trámite y otro para el CUPL.",
                'autor' => 'ADMIN',
            ]);
            $solicitud->comentarios()->create([
                'comentario' => "Le informamos que el recibo de pago del TNS fue enviado a su correo electrónico, y tiene plazo el dia de hoy hasta 11:59 pm para realizar el correspondiente pago.",
                'autor' => 'ADMIN',
            ]);
            return redirect()->back()->with('success', 'Soporte de pago enviado.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error al enviar el recibo de pago: ' . $e->getMessage()]);
        }
    }

    /**
     * Store a newly created solicitud.
     */
    public function addSolicitud(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_documento' => 'required|string|max:255',
            'identificacion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'persona' => 'required|string|max:255',
            'vehiculo' => 'required|string|max:255',
            'tramite_id' => 'required|string|max:255',
        ]);
        $tramite = Tramite::findOrFail($validatedData['tramite_id']);

        $_documents = $tramite->getArchivosFiltrados(
            $validatedData['vehiculo'],
            $validatedData['persona']
        );
        $documents = [];
        foreach ($_documents as $doc) {
            $meta = $doc['file_metadata'];
            $documents['file_'.$meta['nombre']] = '-' . $meta['nombre'] . '.' . $meta['tipo'];
        }
        $storedFiles = [];
        $validatedData['radicado'] = now()->format('Ymd') . str_pad(Solicitud::count() + 1, 3, '0', STR_PAD_LEFT);

        foreach ($documents as $inputName => $suffix) {
            try {
                if ($request->hasFile($inputName)) {
                    $fileName = $validatedData['radicado'] . $suffix;
                    $file = $request->file($inputName);
                    $file->storeAs('uploads', $fileName, 'public');
                    $storedFiles[$inputName] = '/' . $fileName;
                }
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['Error al cargar documento: ' . $th->getMessage()]);
            }
        }

        $solicitud_id = DB::transaction(function () use ($validatedData, $storedFiles) {
            $validatedData['estado'] = 'EN REVISION';
            $validatedData['usuario_id'] = Auth::user()->id;
            $solicitud = Solicitud::create($validatedData);
            foreach ($storedFiles as $key => $value) {
                $newDocumento = new Documento();
                $newDocumento->tipo = strtoupper(str_replace('file_', '', $key));
                $newDocumento->tipo = str_replace('_', ' ', $newDocumento->tipo);
                $newDocumento->ruta = $value;
                $newDocumento->solicitud_id = $solicitud->id;
                $newDocumento->save();
            }
            return $solicitud->id;
        });

        return redirect("/user/solicitudes/{$solicitud_id}/ver")->with('success', 'Solicitud creada exitosamente.');
    }

    /**
     * Display the specified solicitud.
     */
    public function verSolicitud($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.usuario-ver', compact('solicitud'));
    }

    /**
     * Display the solicitudes of the authenticated user.
     */
    public function verUserSolicitudes(Request $request)
    {
        $userId = Auth::user()->id;
        $request->query->set('usuario_id', $userId);
        $solicitudes = $this->getSolicitudesByStatusPaginated('TODOS', $request, );
        return view('solicitudes.usuario-lista', compact('solicitudes'));
    }
}
