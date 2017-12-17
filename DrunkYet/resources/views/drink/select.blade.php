@extends('layout')

@section('content')
<h1>Selectionne une boisson</h1>
<input id="search_drink" type=text placeholder="Rechercher une boisson"/>
<div class="dy-list" id="drink_results">
    <div class="dy-list-element">
        <span class="dy-element-main">Pas de boisson dans la base de donnée.</span>
    </div>
</div>
<a href="{{ URL::action('AddDrinkController@create') }}">
    <div class="dy-button-normal"> Ajouter une boisson</div>
</a>
<a href="{{ URL::action('HomeController@home') }}"><div class="dy-button-normal">Annuler</div></a>
@endsection
