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

        $documents = [
            'id' => '-id.pdf',
            'fun' => '-fun.xls',
            'propiedad' => '-propiedad.pdf',
            'poder' => '-poder.pdf',
            'constancia_de_pago' => '-constancia-pago.pdf',
        ];
        $storedFiles = [];

        foreach ($documents as $inputName => $suffix) {
            try {
                if ($request->hasFile($inputName)) {
                    $fileName = $solicitud->radicado . $suffix;
                    $file = $request->file($inputName);
                    $file->storeAs('uploads', $fileName, 'public');
                    $storedFiles[$inputName] = '/' . $fileName;
                }
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['Error al cargar documento: ' . $th->getMessage()]);
            }
        }

        foreach ($storedFiles as $key => $value) {
            $newDocumento = new Documento();
            $newDocumento->tipo = strtoupper(str_replace('_', ' ', $key));
            $newDocumento->ruta = $value;
            $newDocumento->solicitud_id = $solicitud->id;
            $newDocumento->save();
        }

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
