<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class LogUserController extends Controller
{
    // Show the login form
    public function index(): View
    {
        return view('auth.login');
    }

    // Handle the login request
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("/")->with('success', 'Logged in successfully');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials!!'
        ]);
    }


    

    // Handle the logout request
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully');
    }
}