@extends('welcome')

@section('title','Inicio Sustanciero')

@section('content')
<div class="mw-100 mh-100">
	<div class="mt-5 text-center" style="z-index: 1000 !important;">
		<h5>
			{{$ip}} <br>
			{{$data['latitude']}}, {{$data['longitude']}} <br>
			{{$data['city']}}
		</h5>
	</div>
	<div id="map" style="width: full; height: 100%;">

		
	</div>
</div>
{{-- <div class="container">
    <br>
    <pre><code>{{$markets}}</code></pre>
    
</div> --}}
@endsection

@section('js')
<script>	

	var mymap = L.map('map').setView([{{$data['latitude']}}, {{$data['longitude']}}], 16);
	mymap.addControl(new L.Control.Fullscreen());
	


	


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
		marker.setLatLng([{{$market->latitude}},{{$market->longitude}}]).addTo(mymap);
		popup.setLatLng([{{$market->latitude}},{{$market->longitude}}]).setContent('Comercio: {{$market->name}} <br> Direccion: {{$market->ubicacion}}');
		marker.bindPopup(popup).openPopup();
	@endforeach
	




	//}

</script>
@endsection