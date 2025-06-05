<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function addComentario(Request $request, $solicitudId)
    {
        $validatedData = $request->validate([
            'comentario' => 'required|string|max:500',
        ]);
        $validatedData['solicitud_id'] = $solicitudId;
        Comentario::create($validatedData);
        return back()->with(['triggerComentario' => $solicitudId]);
    }
}
