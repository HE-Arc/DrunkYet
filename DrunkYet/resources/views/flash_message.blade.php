@if ($flash = session('message'))
    <div id="dy-notify">
        <h3>{{$flash}}</h3>
    </div>
@endif
