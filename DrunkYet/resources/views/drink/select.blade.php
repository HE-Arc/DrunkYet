@extends('layout')

@section('content')
<h1>Selectionnez une boisson</h1>
<input id="search_drink" type=text placeholder="Rechercher une boisson"/>
<div class="dy-list" id="drink_results">
    <div class="dy-list-element">
        <span class="dy-element-main">Vodka</span>
        <div class="dy-element-right">
            <span class="dy-element-second">40° 2dl</span>
            <span class="dy-button-strong dy-element-action">
                &rsaquo;
            </span>
        </div>
    </div>
</div>
<a href="{{ URL::action('AddDrinkController@create') }}">
    <div class="dy-button-normal">Ajouter une boisson</div>
</a>
<a href="{{ URL::action('HomeController@home') }}"><div class="dy-button-normal">Annuler</div></a>
@endsection
