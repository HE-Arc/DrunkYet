@extends('layout')

@section('content')
<h1>Bonjour {{$user->name}}</h1>
<p>Votre taux d'alcoolémie est de</p>
<div id="AlcoholLevel"><span>{{round($user->alcoholLevel(), 2)}}</span>‰</div>
@if($user->alcoholLevel() < 0.48)
    <p>Vous pouvez conduire.</p>
@else
    <p>Vous ne pouvez pas conduire.</p>
@endif
<a href="{{URL::action('DrinkController@select')}}"><div class="dy-button-strong">Ajouter une consommation</div></a>
@if($user->name!="invité")
    <a href="{{URL::action('RegistrationController@edit')}}"><div class="dy-button-normal">Editer les informations du compte</div></a>
@endif
<a href="{{URL::action('SessionsController@destroy')}}"><div class="dy-button-normal">Se déconnecter</div></a>
@endsection
