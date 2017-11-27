@extends('layout')

@section('content')
<h1>Acceuil</h1>
<h2>Acceuil</h2>
<h3>Acceuil</h3>
<h4>Acceuil</h4>
<img src="home_1024.png">
<p>Pommes</p>
<a href="/"><div class="dy-button-strong">Se Connecter</div></a>
<div class="dy-button-normal">Continuer comme invité</div>
<input type="text" placeholder="Vodka"/>
<input type="number" placeholder="Vodka"/>
<input type="email" placeholder="email" />
<input type="password" placeholder="pass" />
<select>
    <option>ml</option>
    <option>cl</option>
    <option>dl</option>
</select>
<div class="dy-input-select">
    <input type="number" placeholder="Vodka"/>
    <select>
        <option>ml</option>
        <option>cl</option>
        <option>dl</option>
    </select>
</div>
<div class="dy-radio-group">
    <input checked id="male" type=radio name=gender/>
    <label for="male">Homme</label>
    <input id="female" type=radio name=gender/>
    <label for=female>Femme</label>
</div>
@endsection
