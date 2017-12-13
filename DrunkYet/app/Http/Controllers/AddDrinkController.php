<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Drink;

class AddDrinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view("drink.add");
    }
    public function store()
    {
        $this->validate(request(),[
            'name' => 'required|min:2|string',
            'degree' => 'required|int|min:1|max:100',
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

        $drink = Drink::create([
            'name' => request('name'),
            'default_degree' => request('degree'),
            'default_quantity' => $quantity
        ]);

        session()->flash('message','Votre boisson a bien été ajouté.');

        return redirect('/drink');
    }
}
