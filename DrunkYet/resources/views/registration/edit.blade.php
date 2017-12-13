@extends('layout')

@section('content')
<h1>Modification du compte</h1>
<form action="/edit" method="POST">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" value={{$user->name}} required>

    <div class="dy-radio-group">
        <input id="male" value="male" type=radio name="gender" {{($user->gender == 'male') ? "checked" : ""}}/>
        <label for="male">Homme</label>
        <input id="female" value="female" type=radio name="gender" {{($user->gender == 'female') ? "checked" : ""}}/>
        <label for=female>Femme</label>
    </div>

    <label for=birth"">Date de naissance :</label>
    <input type="date" id="birth" name="birth" value={{$user->birth}} required/>

    <label for=weight"">Poids :</label>
    <input type="number" id="weight" name="weight" value={{$user->weight}} required/>

    <label for=email"">Email :</label>
    <input type="email" id="email" name="email" value={{$user->email}} required/>

    <a href="/pswd"><div class="dy-button-normal">Changer mot de passe</div></a>

    <button type="submit" name="button" class="dy-button-strong">Modifier</button>
    <a href="/"><div class="dy-button-normal">Annuler</div></a>
</form>
@include('errors')
@endsection
