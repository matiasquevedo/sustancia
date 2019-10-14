@extends('admin.template.main')

@section('title','Empresa: '.$busines->name)

@section('content')

<div class="container">
	
	
	<div>
		<h3>
			{{$busines->name}}

			@if($busines->mp == '0')
				
			@elseif($busines->mp=='1')
				<img src="/image/mp.png" width="50" alt="">
			@endif
			
			@if($busines->state == '0')
				<a href="{{route('market.post',$busines->id)}}" class="btn btn-info">Publicar</a>
			@elseif($busines->state=='1')
				<a href="{{route('market.undpost',$busines->id)}}" class="btn btn-info">Despublicar</a>
			@endif
		</h3>



		
	</div>



	
	<h4>Direccion: <i id="address">{{$busines->ubicacion}}</i> </h4>
	<div>
		<h4>Descripción y Referencias</h4>
		<p>{{$busines->descripcion}}</p>
	</div>



	<div id="map" style="width: full; height: 100%;"></div> <br>
	
	<pre><code>{{$busines}}</code></pre>
	<pre><code>{{$busines->image}}</code></pre>
	
</div>
@endsection

@section('js')
<script>
	var mymap = L.map('map').setView([{{$busines->latitude}},{{$busines->longitude}}], 15);
	var address;

	/* USANDO MAPBOX*/
	
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 25,
		id: 'mapbox.streets',
		accessToken: 'pk.eyJ1IjoibWF0aWFzcXVldmVkbyIsImEiOiJjazFwaW5kMHAwMWx3M2NrNDhrOXFkeTg0In0.6iha-fBESxiMBBV_mnPnOg'
	}).addTo(mymap);



	/* 	USANDO OPENSTREETMAP		
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	    }).addTo(mymap);
	/* */
	var popup = L.popup();
	var marker = L.marker();



	var circle = L.circle([-34.618669, -68.339767], {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.1,
		radius: 50
	}).addTo(mymap);
	var polygon = L.polygon([
		[-34.618669, -68.339767],
		[-34.618669, -68.339767],
		[-34.618669, -68.339767]
	]).addTo(mymap);
	marker.setLatLng([{{$busines->latitude}},{{$busines->longitude}}]).addTo(mymap);
	popup.setLatLng([{{$busines->latitude}},{{$busines->longitude}}]).setContent('Comercio: {{$busines->name}} <br> Direccion: {{$busines->ubicacion}}');
	marker.bindPopup(popup).openPopup();

	// var map;
	// function initMap() {
	// 	var myLatLng = {lat:  {{$busines->latitude}} , lng:  {{$busines->longitude}} };
	// 	//var myLatLng = {lat: -68.36426334929843, lng: -68.36426334929843};
	// 	console.log(myLatLng);
	// 	map = new google.maps.Map(document.getElementById('map'), {
	// 		center: myLatLng,
	// 		zoom:18
	// 	});

	// 	var marker = new google.maps.Marker({
	// 		position: myLatLng,
	// 		map: map,
	// 	});

	// 	var infowindow = new google.maps.InfoWindow({
	// 		content: 'Comercio: {{$busines->name}} <br> Direccion: {{$busines->ubicacion}}'
	// 	});
	// 	infowindow.open(map,marker);



	//}

</script>
@endsection





















