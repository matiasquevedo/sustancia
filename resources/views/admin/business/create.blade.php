@extends('admin.template.main')

@section('title','Nuevo Negocio')

@section('content')
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

					<li>
						{{ $error}}
					</li>

				@endforeach
			</ul>
			

		</div>
	@endif

<div class="container">
	<h3>Nuevo Negocio</h3>

	{!! Form::open(['route'=>'business.store', 'method'=>'POST']) !!}
		<div class="form-group">
			{!! Form::label('name','Nombre Empresa') !!}
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('ubicacion','Dirección') !!}
			{!! Form::text('ubicacion',null,['class'=>'form-control','id'=>'direccion','placeholder'=>'Direccion','required']) !!}
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
			{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
		</div>


	{!! Form::close() !!}

	<!-- <div style="width: full; height: 250px;">
		{!! Mapper::render() !!}
	</div> -->

	



</div>
@endsection

@section('js')

<script>
	var map;
	var marker;
	function initMap() {
	    map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.618669, lng: -68.339767},
	    	zoom: 13
	    });


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