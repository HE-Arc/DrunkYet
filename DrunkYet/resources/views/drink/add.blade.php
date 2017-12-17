@extends('layout')

@section('content')
<h1>Ajout d'une boisson</h1>
<form method="POST" action="{{URL::action('AddDrinkController@store')}}">
    {{ csrf_field() }}
    <label for="name">Nom:</label>
    <input id="name" type="text" class="form-control" name="name" placeholder="Nom de la boisson" required>
    <label for="degree">Degré d'alcool:</label>
    <input id="degree" type="number" step="0.1" class="form-control" name="degree" placeholder="18°" required>
    <label for="quantity">Contenance:</label>
    <div class="dy-input-select">
        <input id="quantity" type="number" class="form-control" name="quantity" placeholder="100" required>
        <select name="unit">
            <option value="ml">ml</option>
            <option value="cl">cl</option>
            <option value="dl">dl</option>
        </select>
    </div>
    <button class="dy-button-strong">Ajouter la boisson</button>
    <a href="{{URL::action('DrinkController@select')}}">
        <div class="dy-button-normal">Annuler</div>
    </a>
</form>
@include('errors')
@endsection
