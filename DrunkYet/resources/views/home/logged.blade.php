@extends('layout')

@section('content')
@if (Auth::check())
    <h1>Connecté en tant que {{Auth::user()->name}}</h1>
@endif

<a href="/drink"><div class="dy-button-strong">Ajouter une consommation</div></a>
@endsection
