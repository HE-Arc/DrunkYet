@extends('layout')

@section('content')
@if(env('APP_ENV') == 'production')
<img src="{{ URL::secureAsset('/home_1024.png')}}">
@else
<img src="{{ URL::asset('/home_1024.png')}}">
@endif
<div class="dy-space-1"></div>
<a href="/login"><div class="dy-button-strong">Se Connecter</div></a>
<a href="/register"><div class="dy-button-strong">Créer un compte</div></a>
<a href="/guest"><div class="dy-button-normal">Continuer comme invité</div></a>
@endsection
