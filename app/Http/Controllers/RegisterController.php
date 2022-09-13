<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('layouts.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $r)
    {
        // Validate input
        $rules = [
            'name' => 'required|max:255',
            'username' => 'required|between:8,255|unique:users',
            'email' => 'required|email|unique:users|email:dns',
            'password' => 'required|between:8,255|confirmed',
            'password_confirmation' => 'required|between:8,255'
        ];

        $data = $r->validate($rules);

        // Create
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        // Redirect
        $r->session()->flash('success', 'Registration succesful, please proceed to log in');

        return redirect('/login');
    }
}
