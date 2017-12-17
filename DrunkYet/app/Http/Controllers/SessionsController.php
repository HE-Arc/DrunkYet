<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('auth.create');
    }

    public function store()
    {
        $remember = request('remember') == 'on';

        if(!auth()->attempt(request(['email', 'password']),$remember))
        {
            return back()->withErrors([
                'message' => 'Vérifiez votre identification et réessayez.'
            ]);
        }

        return redirect('/');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
