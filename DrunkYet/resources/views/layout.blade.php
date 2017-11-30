<html>
<head>
  <title>DrunkYet</title>
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="icon" type="image/png" href="fav_64.png" />
  <link rel="stylesheet" type="text/css" href="css/vodka.css" />
  <script src="js/vodka.js"></script>
</head>
<body>
  <div id="dy-content">
    @yield('content')
  </div>
  @include('flash_message')
</body>
</html>
