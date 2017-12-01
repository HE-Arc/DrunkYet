<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Drink;

class AddDrinkController extends Controller
{
    public function create()
    {
        return view("drink.add");
    }
    public function store()
    {

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
