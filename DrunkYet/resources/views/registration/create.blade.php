@extends('layout')

@section('content')
<h1>Création de compte</h1>
<form action="{{ URL::action('RegistrationController@store') }}" method="POST">
    {{ csrf_field() }}

    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" value="" required>

    <div class="dy-radio-group">
        <input checked id="male" value="male" type=radio name="gender" checked/>
        <label for="male">Homme</label>
        <input id="female" value="female" type=radio name="gender"/>
        <label for=female>Femme</label>
    </div>

    <label for=birth"">Date de naissance :</label>
    <input type="date" id="birth" name="birth" required/>

    <label for=weight"">Poids :</label>
    <input type="number" id="weight" name="weight" required/>

    <label for=email"">Email :</label>
    <input type="email" id="email" name="email" value="" required/>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" value="" required/>

    <label for="password_confirmation">Confirmation du mot de passe :</label>
    <input type="password" id="password_confirmation" name="password_confirmation" value=""required/>

    <button type="submit" name="button" class="dy-button-strong">Créer</button>
</form>
@include('errors')
@endsection
