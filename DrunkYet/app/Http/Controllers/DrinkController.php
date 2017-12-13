<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function select(){
        return view('drink.select');
    }
}
