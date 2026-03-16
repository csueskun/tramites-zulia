<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $throttleKey = Str::transliterate(Str::lower($request->input('email')).'|'.$request->ip());

        if (app(RateLimiter::class)->tooManyAttempts($throttleKey, 3)) {
            $seconds = app(RateLimiter::class)->availableIn($throttleKey);
            throw ValidationException::withMessages([
                'email' => ['Demasiados intentos de inicio de sesión. Por favor, intente de nuevo en '.$seconds.' segundos.'],
            ]);
        }

        if (Auth::attempt($credentials)) {
            app(RateLimiter::class)->clear($throttleKey);

            $user = Auth::user();
            if ($user->email_verified_at === null) {
                $user->generateVerification();
                Auth::logout();
                return redirect('/usuarios/verificar')->with('success', 'Debe verificar su correo electrónico antes de iniciar sesión.')->withInput(['email' => $credentials['email']]);
            }

            $request->session()->regenerate();
            $role = strtolower($user->role);
            return redirect()->intended("/$role/home");
        }

        $attempts = app(RateLimiter::class)->hit($throttleKey, 3600); // Hit and keep for 1 hour

        if ($attempts >= 3) {
            // Trigger password reset
            \Illuminate\Support\Facades\Password::sendResetLink(['email' => $request->input('email')]);
            
            return back()->with('error', 'Su cuenta ha sido bloqueada tras 3 intentos fallidos. Se ha enviado un enlace de restablecimiento de contraseña a su correo electrónico.')->withInput();
        }

        return back()->withErrors(['email' => 'Usuario o contraseña incorrecta. Intentos restantes: ' . (3 - $attempts)])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
