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

            'name'  =>  'required',
            'email'  =>  'required|email|unique:users',
            'password'  =>  'required',
            'weight' => 'required',
            'birth' => 'required'
        ]);

        $user = User::create(request(['name', 'email', 'birth', 'password', 'birth']));
        auth()->login($user);

        return redirect('/user');
    }
}
