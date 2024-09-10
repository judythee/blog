<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email] // Passes the token and email to the reset view
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required', // Validates the token
            'email' => 'required|email', // Validates the email
            'password' => 'required|confirmed|min:8', // Validates the new password
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password), // Hashes and sets the new password
                    'remember_token' => Str::random(60), // Generates a new remember token
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status)) // If successful, redirect to login with status message
                    : back()->withErrors(['email' => [__($status)]]); // If failed, return with error message
    }
}
