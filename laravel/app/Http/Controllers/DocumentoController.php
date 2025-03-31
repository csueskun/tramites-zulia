<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Documento;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function addDocumento(Request $request, $solicitudId)
    {
        $solicitud = Solicitud::find($solicitudId);
        $validatedData = $request->all();

        $document = DB::transaction(function () use ($validatedData, $solicitud) {
            $validatedData['solicitud_id'] = $solicitud->id;
            $validatedData['ruta'] = '/' . $solicitud->radicado . '-constancia-de-pago.pdf';
            $document = Documento::create($validatedData);
            $solicitud->update(['status' => 'updated']);
            return $document;
        });

        return redirect("/user/solicitudes/{$solicitudId}/ver")->with('success', 'Documento enviado exitosamente.');
    }

    public function download($id)
    {
        $documento = Documento::findOrFail($id);
        $filePath = "uploads{$documento->ruta}";

        // Explicitly specify the 'public' disk for downloading
        return Storage::disk('public')->download($filePath);
    }
}
