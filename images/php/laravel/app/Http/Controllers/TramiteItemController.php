<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TramiteItem;

class TramiteItemController extends Controller
{
    public function update(Request $request, TramiteItem $item)
    {
        $validatedData = $request->validate([
            'precio' => 'required|numeric',
        ]);

        $item->update($validatedData);

        return redirect()->back()->with('success', 'Valor actualizado correctamente.');
    }
}
