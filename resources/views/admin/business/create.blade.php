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

	{!! Form::open(['route'=>'markets.store', 'method'=>'POST']) !!}
		<div class="form-group">
			{!! Form::label('name','Nombre Empresa') !!} <p><i>No es obligatorio</i></p>
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('ubicacion','Dirección') !!} <p><i>No es obligatorio. El sistema sugiere una dirección.</i></p>
			{!! Form::text('ubicacion',null,['class'=>'form-control','id'=>'direccion','placeholder'=>'Direccion']) !!}
		</div>

		<div class="form-group" style="display: none !important;">
			{!! Form::text('latitude',null,['class'=>'form-control','id'=>'latitude','placeholder'=>'Direccion','required']) !!}
		</div>

		<div class="form-group" style="display: none !important;">
			{!! Form::text('longitude',null,['class'=>'form-control','id'=>'longitude','placeholder'=>'Direccion','required']) !!}
		</div>
		<div class="form-group">
		{!! Form::label('mp','MercadoPago') !!}
		{!! Form::checkbox('mp', '1', false); !!}
		</div>

		<div class="form-group">
		{!! Form::label('descripcion','Descripcion*') !!} <p><i>Coloque alguna referencia. Ej: Portón Verde.</i></p>
		{!! Form::textarea('descripcion',null,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Descripcion']) !!}
		</div>

		<div class="form-group"  style="display:  !important;">
			{!! Form::text('locality',null,['class'=>'form-control','id'=>'local','placeholder'=>'localidad']) !!}
		</div>

		<div class="form-group"  style="display:  !important;">
			{!! Form::text('subAdministrativeArea',null,['class'=>'form-control','id'=>'area','placeholder'=>'area']) !!}
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

	    var geocoder = new google.maps.Geocoder();


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

	    		console.log(location);
	    		//map.setCenter(event.latLng);
	    		var infowindow = new google.maps.InfoWindow({
	    		  content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
	    		});
	    		infowindow.open(map,marker);
	    		//map.setCenter(event.latLng);
	    		$('#latitude').val(location.lat());
	    		$('#longitude').val(location.lng());

	    		var latlng = {lat: location.lat(), lng: location.lng()};	    		
	    		console.log('latlogn:'+latlng);
	    		geocoder.geocode({'location':latlng}, function(result,status){
	    			if(status==='OK'){
	    				var address_components = result[0].address_components;
	    				var components={}; 
	    				jQuery.each(address_components, function(k,v1) {jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});});
	    				console.log(components);
	    				console.log(components.locality);
	    				console.log(components.administrative_area_level_2);
	    				direccion = result[0].formatted_address.split(",");
	    				$('#direccion').val(direccion[0]);
	    				$('#local').val(components.locality);
	    				$('#area').val(components.administrative_area_level_2);    				
	    			} else {
	    				console.log("todo mal");
	    			}
	    		});

	    	} else {
	    		console.log("Reasignacion de location")
	    		marker.setPosition(location);
	    		$('#latitude').val(location.lat());
	    		$('#longitude').val(location.lng());

	    		var latlng = {lat: location.lat(), lng: location.lng()};	    		
	    		console.log('latlogn:'+latlng);
	    		geocoder.geocode({'location':latlng}, function(result,status){
	    			if(status==='OK'){
	    				var address_components = result[0].address_components;
	    				var components={}; 
	    				jQuery.each(address_components, function(k,v1) {jQuery.each(v1.types, function(k2, v2){components[v2]=v1.long_name});});
	    				console.log(components);
	    				console.log(components.locality);
	    				console.log(components.administrative_area_level_2);
	    				direccion = result[0].formatted_address.split(",");
	    				$('#direccion').val(direccion[0]);
	    				$('#local').val(components.locality);
	    				$('#area').val(components.administrative_area_level_2);    				
	    			} else {
	    				console.log("todo mal");
	    			}
	    		}); 
	    	}
	    }

	}


	 
</script>
@endsection