@extends('admin.template.main')

@section('title','Empresa: '.$busines->name)

@section('content')

<div class="container">
	{{$busines}}
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



	<div id="map" style="width: full; height: 250px;"></div> <br>	

	
</div>
@endsection

@section('js')
<script>

	var map;
	function initMap() {
		var myLatLng = {lat:  {{$busines->latitude}} , lng:  {{$busines->longitude}} };
		//var myLatLng = {lat: -68.36426334929843, lng: -68.36426334929843};
		console.log(myLatLng);
		map = new google.maps.Map(document.getElementById('map'), {
			center: myLatLng,
			zoom:18
		});

		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
		});

		var infowindow = new google.maps.InfoWindow({
			content: 'Comercio: {{$busines->name}} '
		});
		infowindow.open(map,marker);



	}

</script>
@endsection





















