<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Solicitud;

use Illuminate\Http\Request;
use App\Jobs\RegistrarComentarioJob;

class ComentarioController extends Controller
{
    public function addComentario(Request $request, $solicitudId)
    {
        $validatedData = $request->validate([
            'comentario' => 'required|string|max:500',
        ]);
        $validatedData['solicitud_id'] = $solicitudId;
        Comentario::create($validatedData);
        $solicitud = Solicitud::find($solicitudId);
        $comentario = $validatedData['comentario'];
        RegistrarComentarioJob::dispatch($solicitud->id, $solicitud->radicado, $comentario);
        return back()->with(['triggerComentario' => $solicitudId]);
    }
}
