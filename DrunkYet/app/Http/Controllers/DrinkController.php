<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;

class DrinkController extends Controller
{
    //
    public function select(){
        return view('drink.select');
    }

    public function consume($drink_id){
        $drink = Drink::find($drink_id);
        return view('drink.consume',['drink'=>$drink]);
    }

    public function store(){

    }
}
