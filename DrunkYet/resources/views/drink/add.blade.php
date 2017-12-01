@extends('layout')

@section('content')
<h1>Ajouts d'une boisson</h1>
<form method="POST" action="/add">
    {{ csrf_field() }}
    <label for="name">Nom :</label>
    <input id="name" type="text" class="form-control" name="name" placeholder="Nom de la boisson" required>
    <label for="degree">Degrée d'alcool:</label>
    <input id="degree" type="number" class="form-control" name="degree" placeholder="18°" required>
    <label for="quantity">Contenance :</label>
    <div class="dy-input-select">
        <input id="quantity" type="number" class="form-control" name="quantity" placeholder="100" required>
        <select name="unit">
            <option value="ml">ml</option>
            <option value="cl">cl</option>
            <option value="dl">dl</option>
        </select>
    </div>
    <input class="dy-button-strong" type="submit" value="Ajouter la boisson">
</form>
@endsection
