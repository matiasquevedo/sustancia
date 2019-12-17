<html>
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>
  
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/leaflet/leaflet.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/leaflet-geocoder/dist/Control.Geocoder.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/leaflet-fullscreen/dist/leaflet.fullscreen.css')}}">
    </head>
    <body>
        @include('nav')
        @include('flash::message')
        @yield('header')
        <section>
            @yield('content')
            

        </section>
        <script src="{{asset('plugins/jquery/jquery.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('plugins/fontawesome/js/all.js')}}"></script>
        <script src="{{asset('plugins/leaflet/leaflet.js')}}"></script>
        <script src="{{asset('plugins/leaflet-geoip/leaflet-geoip.js')}}"></script>
        <script src="{{asset('plugins/leaflet-geocoder/dist/Control.Geocoder.js')}}"></script> 
        <script src="{{asset('plugins/leaflet-fullscreen/dist/leaflet.fullscreen.js')}}"></script>
        <script src="{{asset('plugins/leaflet-fullscreen/dist/leaflet.fullscreen.js')}}"></script>
        <script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-image/v0.0.4/leaflet-image.js'></script>
        @yield('js')
    </body>

</html>

