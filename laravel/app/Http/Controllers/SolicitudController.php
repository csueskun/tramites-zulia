<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Solicitud;
use App\Services\MailService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarReciboDePago;

class SolicitudController extends Controller
{
    protected $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }
    /**
     * Retrieve all solicitudes.
     */
    public function viewHome()
    {
        if (Auth::user()->role === 'ADMIN') {
            return view('admin-home');
        } else {
            return view('user-home');
        }
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
        $solicitudes = $this->getSolicitudesByStatusPaginated(['VALIDADA'], $current_page, null,);
        return view('solicitudes.completadas', compact('solicitudes'));
    }

    /**
     * Update the specified solicitud.
     */
    public function patchFromView(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->update($request->all());
        return redirect()->back()->with('success', 'Solicitud actualizada exitosamente.');
    }
    public function mailReciboDePago(Request $request, $id)
    {
        try {
            $solicitud = Solicitud::findOrFail($id);
            $fileName = $solicitud->radicado . '-recibo-de-pago.pdf';
            if ($request->hasFile('inputFile')) {
                $file = $request->file('inputFile');
                $file->storeAs('uploads', $fileName, 'public'); // Store in storage/app/public/uploads
            }
            $this->mailService->sendReciboDePago($solicitud, 'app/public/uploads/'.$fileName);
            $solicitud->documentos()->create([
                'tipo' => 'RECIBO DE PAGO',
                'ruta' => '/' . $fileName,
            ]);
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
            if ($request->hasFile('inputFile')) {
                $file = $request->file('inputFile');
                $file->storeAs('uploads', $fileName, 'public');
            }
            $this->mailService->sendCertificado($solicitud, 'app/public/uploads/'.$fileName);
            $solicitud->documentos()->create([
                'tipo' => 'CERTIFICADO',
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
        $validatedData = $request->validate([]);
        $validatedData['estado'] = 'EN REVISION';
        $validatedData['usuario_id'] = Auth::user()->id;
        $validatedData['radicado'] = 'SOL-' . date('Y') . '-' . str_pad(Solicitud::count() + 1, 4, '0', STR_PAD_LEFT);

        $solicitud = Solicitud::create($validatedData);

        return redirect("/user/solicitudes/{$solicitud->id}/ver")->with('success', 'Solicitud creada exitosamente.');
    }

    /**
     * Display the specified solicitud.
     */
    public function verSolicitud($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.usuario-ver', compact('solicitud'));
    }
}
