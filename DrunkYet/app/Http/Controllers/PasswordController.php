<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\ValidationPassword;
use App\User;

class PasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('connected.guest');
    }

    public function edit(){
        return view('registration.editPswd');
    }

    public function update(){
        $user = Auth::user();
        $this->validate(request(),[

            'password' => ['required', new ValidationPassword($user)],
            'newPassword'  =>  'required|min:6|confirmed',
        ]);


        User::where("id", $user->id)->update([
            'password' => bcrypt(request('newPassword'))
        ]);

        session()->flash('message','Mot de passe modifié');

        return redirect('/');
    }
}
