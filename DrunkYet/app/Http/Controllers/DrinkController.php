<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Drink;
use Carbon\Carbon;

class DrinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function select(){
        return view('drink.select');
    }

    public function consume($drink_id){
        $drink = Drink::find($drink_id);
        return view('drink.consume',['drink'=>$drink]);
    }

    public function search(){
        $query = request('s');
        if($query != ""){
            return Drink::where('name','LIKE','%'.$query.'%')->limit(10)->get();
        }
        else{
            $consumed = Auth::user()->drinks()
            ->select('drink_id','default_quantity','default_degree','name')
            ->get()
            ->groupBy('drink_id')->map(function($var,$key){
                return $var->count();
            })->sort()->reverse()->map(function($count, $id){
                return Drink::find($id);
            })->flatten();
            return $consumed->union(Drink::where('name','LIKE','%')->limit(10-$consumed->count())->get());
        }
    }

    public function store(){

        $this->validate(request(),[
            'drink_id' => 'required|int',
            'degree' => 'required|numeric|min:0|max:100',
            'quantity' => 'required|int|min:1|max:1000'
        ]);

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
            'drinking_time' => Carbon::Now('UTC')->subMinutes(request('time'))
        ]);
        session()->flash('message','Votre consommation a été ajoutée.');
        return redirect('/');
    }
}
