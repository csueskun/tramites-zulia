<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Solicitud;
use App\Models\Documento;
use App\Models\Tramite;
use App\Models\Comentario;
use App\Services\MailService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarReciboDePago;
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
    public function getSolicitudesByStatusPaginated($estados, $current_page, $query, $has_document = '')
    {
        $solicitudesQuery = Solicitud::whereIn('estado', $estados);

        if ($query) {
            $solicitudesQuery->where(function ($q) use ($query) {
                $q->where('radicado', 'like', "%$query%")
                    ->orWhere('asunto', 'like', "%$query%");
            });
        }

        if ($has_document) {
            $solicitudesQuery->whereHas('documentos', function ($q) use ($has_document) {
                $q->where('tipo', $has_document);
            });
        }

        $solicitudes = $solicitudesQuery->paginate(10, ['*'], 'page', $current_page);

        // Check if the current page has no records and fallback to the last page with data
        if ($solicitudes->isEmpty() && $current_page > 1) {
            $lastPage = $solicitudes->lastPage();
            $solicitudes = $solicitudesQuery->paginate(10, ['*'], 'page', $lastPage);
        }

        return $solicitudes;
    }

    /**
     * Display the pendientes view.
     */
    public function viewPendientes(Request $request)
    {
        $current_page = $request->query('page', 1);
        $solicitudes = $this->getSolicitudesByStatusPaginated(['EN REVISION'], $current_page, null);
        return view('solicitudes.pendientes', compact('solicitudes'));
    }
    public function viewConsolidadas(Request $request)
    {
        $current_page = $request->query('page', 1);
        $solicitudes = $this->getSolicitudesByStatusPaginated(['APROBADA', 'RECHAZADA'], $current_page, null);
        return view('solicitudes.consolidadas', compact('solicitudes'));
    }
    public function viewAceptadas(Request $request)
    {
        $current_page = $request->query('page', 1);
        $solicitudes = $this->getSolicitudesByStatusPaginated(['APROBADA'], $current_page, null);
        return view('solicitudes.aceptadas', compact('solicitudes'));
    }
    public function viewPagadas(Request $request)
    {
        $current_page = $request->query('page', 1);
        $solicitudes = $this->getSolicitudesByStatusPaginated(['APROBADA', 'VALIDADA'], $current_page, null, 'CONSTANCIA DE PAGO');
        return view('solicitudes.pagadas', compact('solicitudes'));
    }
    public function viewCompletas(Request $request)
    {
        $current_page = $request->query('page', 1);
        $solicitudes = $this->getSolicitudesByStatusPaginated(['VALIDADA'], $current_page, null, );
        return view('solicitudes.completadas', compact('solicitudes'));
    }

    /**
     * Update the specified solicitud.
     */
    public function patchFromView(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->update($request->all());
        if ($solicitud->estado == 'APROBADA') {
            $this->mailService->sendSolicitudAceptada($solicitud);
        }
        if ($solicitud->estado == 'RECHAZADA') {
            $comentario = $request->input('comentario', 'No se proporcionó un motivo.');
            $solicitud->comentarios()->create([
                'comentario' => $comentario,
                'autor' => 'ADMIN',
            ]);
            $this->mailService->sendSolicitudRechazada($solicitud, $comentario);
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
                    'ruta' => $solicitud->radicado . '-recibo-de-pago.pdf',
                ]);
                $solicitud->comentarios()->create([
                    'comentario' => "Su recibo de pago fue enviado por TNS al correo {$solicitud->usuario->email}.",
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
            return redirect()->back()->with('success', 'Recibo de pago enviado.');
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
            return redirect()->back()->with('success', 'Certificado enviado.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error al enviar el certificado: ' . $e->getMessage()]);
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
            'nombres' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
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
    public function verUserSolicitudes()
    {
        $userId = Auth::user()->id;
        $solicitudes = Solicitud::where('usuario_id', $userId)->paginate(10);
        return view('solicitudes.usuario-lista', compact('solicitudes'));
    }
}
