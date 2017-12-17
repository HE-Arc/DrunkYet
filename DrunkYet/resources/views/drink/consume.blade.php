@extends('layout')

@section('content')
<h1>Ajout d'une consommation</h1>
<form method="POST" action="{{ URL::action('DrinkController@store') }}">
    {{ csrf_field() }}
    <h2>{{ $drink->name }}</h2>
    <label for="degree">Degré d'alcool:</label>
    <input id="degree" type="number" min="0" max="100" step="0.1" class="form-control" name="degree" value="{{ $drink->default_degree }}" placeholder="18°" required>
    <label for="quantity">Contenance:</label>
    <div class="dy-input-select">
        <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $drink->default_quantity }}" placeholder="100" required>
        <select name="unit">
            <option value="ml" selected>ml</option>
            <option value="cl">cl</option>
            <option value="dl">dl</option>
        </select>
    </div>
    <label for="time">Consommé :</label>
    <select name="time">
        <option value="0">maintenant</option>
        <option value="5">il y a 5 minutes</option>
        <option value="10">il y a 10 minutes</option>
        <option value="15">il y a 15 minutes</option>
        <option value="30">il y a 30 minutes</option>
        <option value="45">il y a 45 minutes</option>
        <option value="60">il y a 1 heure</option>
    </select>
    <input type="hidden" value="{{ $drink->id }}" id="drink_id" name="drink_id"/>
    <button class="dy-button-strong" type="submit"/>Ajouter la consommation</button>
    <a href="{{ URL::action('DrinkController@select') }}"><div class="dy-button-normal">Annuler</div></a>
</form>
@endsection
