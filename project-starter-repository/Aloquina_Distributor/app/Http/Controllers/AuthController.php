<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    //
    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            return redirect()->intended('/');
        }

        return redirect()->back()->withInput($data)->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }
    //
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
