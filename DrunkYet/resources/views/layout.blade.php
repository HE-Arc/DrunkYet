<html>
<head>
  <title>DrunkYet</title>
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <meta name="mobile-web-app-capable" content="yes">

  @if(env('APP_ENV') == 'production')
  <link rel="icon" type="image/png" href="{{ URL::secureAsset('/fav_64.png')}}" />
  <link rel="stylesheet" type="text/css" href="{{ URL::secureAsset('/css/vodka.css')}}" />
  <script src="{{ URL::secureAsset('/js/vodka.js') }}"></script>
  @else
  <link rel="icon" type="image/png" href="{{ URL::asset('/fav_64.png')}}" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/vodka.css')}}" />
  <script src="{{ URL::asset('/js/vodka.js') }}"></script>
  @endif
</head>
<body>
  <div id="dy-content">
    @yield('content')
  </div>
  @include('flash_message')
</body>
</html>
