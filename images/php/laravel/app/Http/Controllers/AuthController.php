<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->email_verified_at === null) {
                $user->generateVerification();
                Auth::logout();
                return redirect('/usuarios/verificar')->with('success', 'Debe verificar su correo electrónico antes de iniciar sesión.')->withInput(['email' => $credentials['email']]);
            }

            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors(['email' => 'Usuario o contraseña incorrecta.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
