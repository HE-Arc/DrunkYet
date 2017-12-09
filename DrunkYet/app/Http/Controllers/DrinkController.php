<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Drink;
use Carbon\Carbon;

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

    public function search(){
        $query = request('s');
        return Drink::where('name','LIKE','%'.$query.'%')->get();
    }

    public function store(){
        $quantity = request('quantity');

        if(request('unit')=='cl')
        {
            $quantity*=10;
        }
        elseif (request('unit')=='dl')
        {
            $quantity*=100;
        }

        Auth::user()->drinks()->attach(request('drink_id'),[
            'quantity'=>$quantity,
            'degree' => request('degree'),
            'drinking_time' => Carbon::Now()->addHours(1)
        ]);

        return redirect('/');
    }
}
