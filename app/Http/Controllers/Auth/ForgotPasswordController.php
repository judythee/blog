<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email'); // Returns the view for requesting a password reset link
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']); // Validates the email input

        $status = Password::sendResetLink(
            $request->only('email') // Sends the reset link to the provided email
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)]) // If successful, return with status message
                    : back()->withErrors(['email' => __($status)]); // If failed, return with error message
    }
}

