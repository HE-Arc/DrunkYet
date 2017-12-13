<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        session()->flash('message','Merci d\'avoir créé un compte sur DrunkYet');

        auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));

        return redirect('/');
    }

    public function edit()
    {
        return view('registration.edit',["user" => Auth::user()]);
    }

    public function update()
    {
        $user = Auth::user();
        $this->validate(request(),[

            'name'  =>  'required|min:2|string',
            'email'  =>  'required|email',
            'weight' => 'required|integer|min:10',
            'birth' => 'required|date|before:today'
        ]);


        User::where("id", $user->id)->update([
            'name' => request('name'),
            'email' => request('email'),
            'weight' => request('weight'),
            'birth' => request('birth'),
            'gender' => request('gender')
        ]);

        session()->flash('message','Informations mises a jour');

        return redirect('/');
    }

    private function incrementEmail()
    {
        return User::where('name','invité')->count();
    }

    public function createGuest()
    {
        $user = User::create([
            'name' => 'invité',
            'email' => 'guest'.$this->incrementEmail().'@guest.com',
            'password' => bcrypt('1234'),
            'weight' => User::getAverageWeight(),
            'birth' => Carbon::Now(),
            'gender' => 'male'
        ]);

        session()->flash('message','Vous êts connecté en tant qu\'invité les valeurs peuvent ne pas être exacte');

        auth()->login($user);
        return redirect('/');
    }
}
