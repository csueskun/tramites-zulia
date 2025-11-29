<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramite;

class TramiteController extends Controller
{
    //
    public function index()
    {
        // Lógica para mostrar la vista de administración de trámites
        $tramites = Tramite::all();
        return view('tramites.admin', compact('tramites'));
    }

    public function show(Tramite $tramite)
    {
        return view('tramites.editar', compact('tramite'));
    }

    public function update(Request $request, Tramite $tramite)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $tramite->update($validatedData);

        return redirect()->back()->with('success', 'Trámite actualizado correctamente.');
    }
}
