@extends('business.template.main')

@section('title','Editar Negocio: '.$busines->name)

@section('content')
<div class="container">
	<h3>Editar Negocio <i>{{$busines->name}}</i></h3>

	{!! Form::open(['route'=>['business.update', $busines->id], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name','Nombre Empresa') !!}
			{!! Form::text('name',$busines->name,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('ubicacion','Dirección') !!}
			{!! Form::text('ubicacion',$busines->ubicacion,['class'=>'form-control','placeholder'=>'Direccion','required']) !!}
		</div>

		<div class="form-group" style="display: none;">
			{!! Form::text('latitude',null,['class'=>'form-control','id'=>'latitude','placeholder'=>'Direccion','required']) !!}
		</div>

		<div class="form-group" style="display: none;">
			{!! Form::text('longitude',null,['class'=>'form-control','id'=>'longitude','placeholder'=>'Direccion','required']) !!}
		</div>
		
		{!! Form::label('Geolocalizació','Geolocalizació (Doble Click para colorcar marca)') !!}
		<div id="map" style="width: full; height: 250px;"></div> <br>

		<div class="form-group">
			{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
		</div>


	{!! Form::close() !!}

	
</div>
@endsection
@section('js')

<script>
	var map;
	var marker;
	function initMap() {
		var myLatLng = {lat:  {{$busines->latitude}} , lng:  {{$busines->longitude}} };
	    map = new google.maps.Map(document.getElementById('map'), {
			center: myLatLng,
	    	zoom: 13
	    });
	   	
	   	marker = new google.maps.Marker({
	   	  position: myLatLng,
	   	  map: map,
	   	});

	   	var infowindow = new google.maps.InfoWindow({
	   	  content: 'Empresa: {{$busines->name}} '
	   	});
	   	infowindow.open(map,marker);


	    google.maps.event.addListener(map, "click", function(ele) {
	    	placeMarker(ele.latLng);
	    	console.log("click", ele);
	    })

	    function placeMarker(location) {
	    	if ( !marker || !marker.setPosition ) {
	    		console.log("Nueva Instancia")
	    		marker = new google.maps.Marker({
	    		  position: location,
	    		  map: map,
	    		});
	    		//map.setCenter(event.latLng);
	    		var infowindow = new google.maps.InfoWindow({
	    		  content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
	    		});
	    		infowindow.open(map,marker);
	    		//map.setCenter(event.latLng);
	    		$('#latitude').val(location.lat());
	    		$('#longitude').val(location.lng());
	    	} else {
	    		console.log("Reasignacion de location")
	    		marker.setPosition(location);
	    		$('#latitude').val(location.lat());
	    		$('#longitude').val(location.lng());
	    	}
	    }

	}


	 
</script>
@endsection