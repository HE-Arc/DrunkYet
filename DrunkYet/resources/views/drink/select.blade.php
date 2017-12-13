@extends('layout')

@section('content')
<h1>Selectionne une boisson</h1>
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
<div class="dy-button-normal">
    <a href="/add"> Ajouter une boisson</a>
</div>
@endsection
