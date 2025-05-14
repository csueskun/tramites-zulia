<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function viewVerifyEmail(Request $request)
    {
        if (!old('email')) {
            return redirect()->route('login');
        }
        return view('auth.verify-email');
    }
    public function createUser(Request $request)
    {
        $validatedData = $request->validate((new User)->rules(), [
            'password.regex' => 'La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula, una letra minúscula, un número y un carácter especial.',
        ]);

        $user = User::create([
            'nombres' => $validatedData['nombres'],
            'apellidos' => $validatedData['apellidos'],
            'email' => $validatedData['email'],
            'tipo_documento' => $validatedData['tipo_documento'],
            'documento' => $validatedData['documento'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $user->generateVerification();
        return redirect('/usuarios/verificar')->with('success', 'Usuario creado exitosamente. Por favor verifica tu correo electrónico.')->withInput(['email' => $user->email]);
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|string',
        ]);
        $user = User::where('email', $request->email)
            ->where('verification_code', $request->verification_code)
            ->first();
        if ($user) {
            $user->email_verified_at = now();
            $user->verification_code = null;
            $user->save();

            return redirect('/login')->with('success', 'Correo electrónico verificado exitosamente. Ahora puedes iniciar sesión.')->withInput(['email' => $user->email]);
        }
        return redirect('/usuarios/verificar')->withErrors(['verification_code' => 'Código de verificación inválido.'])->withInput(['email' => $request->email, 'verification_code' => $request->verification_code]);
    }
    public function resendVerification(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'email_alternativo' => 'email',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $email = $user->email;
            if(isset($credentials['email_alternativo']) && $credentials['email_alternativo'] != null){
                $email = $credentials['email_alternativo'];
            }
            $user->generateVerification($email);
            return redirect('/usuarios/verificar')->with('success', 'Nuevo código de verificación enviado a '.$email)->withInput(['email' => $request->email]);
        }
        return redirect('/usuarios/verificar')->with('error', 'Usuario no encontrado')->withInput(['email' => $request->email]);
    }
}
