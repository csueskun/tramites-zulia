<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $validatedData = $request->validate((new User)->rules());

        $user = User::create([
            'nombres' => $validatedData['nombres'],
            'apellidos' => $validatedData['apellidos'],
            'email' => $validatedData['email'],
            'tipo_documento' => $validatedData['tipo_documento'],
            'documento' => $validatedData['documento'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect('/usuarios/nuevo')->with('success', 'User created successfully!');
    }
}
