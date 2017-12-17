@if (count($errors))
    <ul id="errors">
        <h2>Erreurs</h2>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
