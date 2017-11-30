@extends('layout')

@section('content')
@include('flash_message')
@if (Auth::check())
    <h1>Connecté en tant que {{Auth::user()->name}}</h1>
@endif

<a href="/"><div class="dy-button-strong">Ajouter une consommation</div></a>
@endsection
