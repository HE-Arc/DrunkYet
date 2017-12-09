@extends('layout')

@section('content')
<h1>Ajouts d'une consommation</h1>
<form method="POST" action="/consume">
    {{ csrf_field() }}
    <h2>{{ $drink->name }}</h2>
    <label for="degree">Degrée d'alcool:</label>
    <input id="degree" type="number" class="form-control" name="degree" value="{{ $drink->default_degree }}" placeholder="18°" required>
    <label for="quantity">Contenance :</label>
    <div class="dy-input-select">
        <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $drink->default_quantity }}" placeholder="100" required>
        <select name="unit">
            <option value="ml" selected>ml</option>
            <option value="cl">cl</option>
            <option value="dl">dl</option>
        </select>
    </div>
    <input type="hidden" value="{{ $drink->id }}" id="drink_id" name="drink_id"/>
    <button class="dy-button-strong" type="submit"/>Ajouter la consommation</button>
    <div class="dy-button-normal">Annuler</div>
</form>
@endsection
