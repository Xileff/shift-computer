<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('layouts.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $r)
    {
        // Validate input
        $rules = [
            'email' => 'required|email:dns',
            'password' => 'required|between:8,255'
        ];

        $data = $r->validate($rules);

        // Auth success
        if (Auth::attempt($data)) {
            $r->session()->regenerate();
            return redirect()->intended('/');
        }

        // Auth failed
        return back()->with('loginFailure', "Couldn't log you in");
    }

    public function logout(Request $r)
    {
        Auth::logout();
        $r->session()->invalidate();
        $r->session()->regenerate();
        return redirect('/');
    }
}
