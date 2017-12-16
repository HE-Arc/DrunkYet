@extends('layout')

@section('content')
<form method="POST" action="{{ URL::action('SessionsController@store') }}">
    {{ csrf_field() }}
    <h1>Connexion</h1>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Adresse e-mail:</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Mot de passe:</label>
        <input id="password" type="password" class="form-control" name="password" required>
    </div>

    <div class="form-group">
        <button type="submit" class="dy-button-strong">
            Connexion
        </button>
    </div>
</form>
@include('errors')
@endsection
