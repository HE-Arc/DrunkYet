<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrinkController extends Controller
{
    //
    public function select(){
        return view('drink.select');
    }
}
