@extends('layout')

@section('content')
<h1>Register</h1>
<form action="/register" method="POST">
    {{ csrf_field() }}

    <label for="name">Name :</label>
    <input type="text" id="name" name="name" value="">

    <div class="dy-radio-group">
        <input checked id="male" type=radio name="gender"/>
        <label for="male">Homme</label>
        <input id="female" type=radio name="gender"/>
        <label for=female>Femme</label>
    </div>

    <label for=birth"">Birth date :</label>
    <input type="date" id="birth" name="birth"/></br>

    <label for=weight"">Weight :</label>
    <input type="number" id="weight" name="weight"/>

    <label for=email"">Email :</label>
    <input type="email" id="email" name="email" value="">

    <label for="password">Password :</label>
    <input type="password" id="password" name="password" value="">

    <button type="submit" name="button" class="dy-button-strong">Register</button>
</form>
@include('errors')
@endsection
