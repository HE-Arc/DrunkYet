<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    public function store()
    {
        $this->validate(request(),[

            'name'  =>  'required|min:2|string',
            'email'  =>  'required|email|unique:users',
            'password'  =>  'required|min:6|confirmed',
            'weight' => 'required|integer|min:10',
            'birth' => 'required|date|before:today'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'weight' => request('weight'),
            'birth' => request('birth'),
            'gender' => request('gender')
        ]);
        auth()->login($user);

        return redirect('/user');
    }
}
