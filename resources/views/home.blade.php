@extends('welcome')

@section('title','Home')

@section('content')
<div class="mw-100 mh-100">
	<div id="map" style="width: full; height: 100%;"></div>
</div>
{{-- <div class="container">
    <br>
    <pre><code>{{$markets}}</code></pre>
    
</div> --}}
@endsection

@section('js')
<script>
	var mymap = L.map('map').setView([-34.57443, -68.329468], 5);
	mymap.addControl(new L.Control.Fullscreen());
	var address;


	/* USANDO MAPBOX*/
	
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox.streets',
		accessToken: 'pk.eyJ1IjoibWF0aWFzcXVldmVkbyIsImEiOiJjazFwaW5kMHAwMWx3M2NrNDhrOXFkeTg0In0.6iha-fBESxiMBBV_mnPnOg'
	}).addTo(mymap);
	var geocoder = L.Control.geocoder().addTo(mymap);




	/* 	USANDO OPENSTREETMAP		
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	    }).addTo(mymap);
	/* */
	@foreach($markets as $market)
		var popup = L.popup();
		var marker = L.marker();
		console.log('{{$market->name}}')
		marker.setLatLng([{{$market->latitude}},{{$market->longitude}}]).addTo(mymap);
		popup.setLatLng([{{$market->latitude}},{{$market->longitude}}]).setContent('Comercio: {{$market->name}} <br> Direccion: {{$market->ubicacion}}');
		marker.bindPopup(popup).openPopup();
	@endforeach
	




	//}

</script>
@endsection