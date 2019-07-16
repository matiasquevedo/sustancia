@extends('admin.template.main')

@section('title','Empresa: '.$busines->name)

@section('content')

<div class="container">
	<h3><i>{{$busines->name}} <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
		Nueva Cancha
	</button> </i></h3>
	<h4>Direccion: <i id="address">{{$busines->ubicacion}}</i> </h4>



	<div id="map" style="width: full; height: 250px;"></div> <br>	

	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLongTitle"> Agregar Cancha  <a style="float: right" data-dismiss="modal" class="btn btn-danger" > <i class="glyphicon glyphicon-remove"></i> </a> </h3>


				</div>
				<div class="modal-body">

					<div>

						{!! Form::open(['route'=>'courts.store', 'method'=>'POST']) !!}

						<div class="form-group" style="display: none;">
							{!! Form::text('busines_id',$busines->id,['class'=>'form-control','placeholder'=>'Cantidad de Jugadores','required']) !!}
						</div>



						<div class="form-group">
							{!! Form::label('cantidad_jugadores','Cantidad de Jugadores*') !!}
							{!! Form::text('cantidad_jugadores',null,['class'=>'form-control','placeholder'=>'Cantidad de Jugadores','required']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('precio','Precio*') !!}
							{!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'Precio','required']) !!}
						</div>

						<div class="modal-footer">
							<div class="form-group" >
								{!! Form::submit('Agregar',['class'=>'btn btn-primary']) !!}
							</div>
						</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		@foreach($busines->fields as $field)
		<div class="col-md-4"> 
			<a href="{{route('courts.edit',$field->id)}}" type="button" class="btn btn-warning btn-circle btn-lg float-edit"><i class="glyphicon glyphicon-pencil"></i></a>

			<a href="{{route('courts.destroy',$field->id)}}" type="button" class="btn btn-danger btn-circle btn-lg float-remove"><i class="glyphicon glyphicon-remove"></i></a>
			<a class="a-field" href="{{route('courts.show',$field->id)}}"> 
			<div class="sheet_fields" >
				<img class="sheet_img" type="image/svg" src="/image/football-field.svg" alt="imagen cancha">

				<h4> N°:{{$field->id}} </h4>
				<h5> Cantidad de Jugadores: {{$field->cantidad_jugadores}} </h5>
				<h5> Precio: ${{$field->precio}} </h5>


			</div><br>
			</a>
		</div>
		@endforeach

	</div>

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
			content: 'Empresa: {{$busines->name}} '
		});
		infowindow.open(map,marker);



	}

</script>
@endsection





















