<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordResetController extends Controller
{
    // 1. Send reset link
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

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
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$&@?\/#*^%+.()])[A-Za-z\d@$&@?\/#*^%+.()]+$/',,
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
