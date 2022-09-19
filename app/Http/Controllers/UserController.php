<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        $rules = [
            'name' => 'required|between:2,255',
            'date_of_birth' => 'date_format:Y-m-d',
            'gender' => Rule::in(['0', '1']),
            'picture' => 'image|file'
        ];

        $data = $r->validate($rules);

        if ($r->file('picture')) {
            if (auth()->user()->picture) Storage::delete(auth()->user()->picture);
            $data['picture'] = $r->file('picture')->store('public/img/profile');
        }

        User::where('id', auth()->user()->id)->update($data);

        return redirect()->intended('/profile')->with('success', 'Profile updated!');
    }
}
