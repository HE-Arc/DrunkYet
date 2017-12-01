@extends('layout')

@section('content')
<h1>Salut {{$user->name}}</h1>
<p>Ton taux d'alcoolémie est de</p>
<div id="AlcoholLevel"><span>{{round($user->alcoholLevel(), 2)}}</span>‰</div>
@if($user->alcoholLevel() < 0.48)
    <p>Tu peux conduire.</p>
@else
    <p>Tu ne peux pas conduire</p>
@endif
<a href="/drink"><div class="dy-button-strong">Ajouter une consommation</div></a>
<a href="/logout"><div class="dy-button-normal">Se déconnecter</div></a>
@endsection
