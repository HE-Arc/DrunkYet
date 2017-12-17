<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function home(){
        if(Auth::check()){
            return $this->logged();
        }
        else{
            return $this->unlogged();
        }
    }

    public function logged(){
        return view("home.logged", ["user" => Auth::user()]);
    }

    public function unlogged(){
        return view("home.unlogged");
    }

    public function alcoholLevel(){
        if(Auth::check()){
            return round(Auth::user()->alcoholLevel(),2);
        }
        else{
            return 0;
        }
    }
}
