<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('layouts.profile', [
            'title' => auth()->user()->username . "'s Profile"
        ]);
    }

    public function update(Request $r)
    {
        return dd($r);
    }
}
