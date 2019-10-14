<html>
	<head>
		<meta>
		<title>@yield('title')</title>

		<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">	
		<link rel="stylesheet" href="{{ asset('plugins/leaflet/leaflet.css')}}">
		<link rel="stylesheet" href="{{ asset('plugins/leaflet-geocoder/dist/Control.Geocoder.css')}}">
		<link rel="stylesheet" href="{{ asset('plugins/leaflet-fullscreen/dist/leaflet.fullscreen.css')}}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		
		@include('admin.template.partials.nav')
		@include('flash::message')
		<section>
			@yield('content')
			

		</section>
		<script src="{{asset('plugins/jquery/jquery.js')}}"></script>
		<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<script src="{{asset('plugins/leaflet/leaflet.js')}}"></script>
		<script src="{{asset('plugins/leaflet-geocoder/dist/Control.Geocoder.js')}}"></script>		
		<script src="{{asset('plugins/leaflet-fullscreen/dist/leaflet.fullscreen.js')}}"></script>
		<script src='https://unpkg.com/leaflet-image@0.4.0/leaflet-image.js'></script>
		@yield('js')
	</body>

</html>