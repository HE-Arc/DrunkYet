@extends('layout')

@section('content')
<h1>Changement de mot de passe</h1>
<form action="{{ URL::action('PasswordController@update') }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <label for="password">Ancien Mot de passe :</label>
    <input type="password" id="password" name="password" value="" required/>

    <label for="password">Nouveau Mot de passe :</label>
    <input type="password" id="newPassword" name="newPassword" value="" required/>

    <label for="password_confirmation">Confirmation du mot de passe :</label>
    <input type="password" id="newPassword_confirmation" name="newPassword_confirmation" value=""required/>

    <button type="submit" name="button" class="dy-button-strong">Changer</button>
    <a href="{{ URL::action('RegistrationController@edit') }}"><div class="dy-button-normal">Annuler</div></a>
</form>
@include('errors')
@endsection
