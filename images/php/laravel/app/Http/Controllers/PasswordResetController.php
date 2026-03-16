<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    // 1. Send reset link
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $throttleKey = 'password-reset|'.Str::transliterate(Str::lower($request->input('email')).'|'.$request->ip());

        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return back()->with('error', 'Demasiados intentos de recuperación. Intente de nuevo en '.$seconds.' segundos.')->withInput(['email' => $request->email]);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status !== Password::RESET_LINK_SENT) {
            RateLimiter::hit($throttleKey, 3600); // Block for 1 hour on fail
            return back()->withErrors(['email' => __($status)])->withInput(['email' => $request->email]);
        }

        RateLimiter::clear($throttleKey);
        return redirect('/login')->with('success',  __($status))->withInput(['email' => $request->email]);
    }

    // 2. Handle password reset
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$&?\/#*^%+.\-_()])[A-Za-z\d@$&?\/#*^%+.\-_()]+$/',
            ],
            'token' => 'required',
            'email' => 'required|email',
        ], [
            'password.regex' => 'La contraseña incluir una letra mayúscula, una letra minúscula, un número y un carácter especial.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect('/login')->with('success',  __($status))->withInput(['email' => $request->email]);
        }

        throw ValidationException::withMessages([
            'email' => [__($status)],
        ]);
    }
    public function showResetForm(Request $request)
    {
        return view('auth.reset-password', [
            'token' => $request->query('token'),
            'email' => $request->query('email'),
        ]);
    }
}
