@extends('layout')

@section('content')
<p>
  Pommes
</p>
<div class="button important">
  Se Connecter
</div>
<div class="button">
  Continuer
</div>
<input type=text placeholder="Nom"/>
<div class="input-select">
  <input min=0 step=".5" type=number placeholder="Nom"/>
  <select>
    <option selected value="">l</option>
    <option value="">dl</option>
    <option value="">cl</option>
    <option selected value="">ml</option>
  </select>
</div>
<div class="radio-group">
  <input checked id="male" type=radio name=gender/>
  <label for="male">Homme</label>
  <input id="female" type=radio name=gender/>
  <label for=female>Femme</label>
</div>
@endsection
