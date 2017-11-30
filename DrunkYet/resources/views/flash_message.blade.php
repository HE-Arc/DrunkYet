@if ($flash = session('message'))
    <div id="flash_message">
        <h3>{{$flash}}</h3>
    </div>
@endif
