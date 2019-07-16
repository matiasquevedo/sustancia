@extends('business.template.main')

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

		<style>

			.sheet_fields{
				width:250px;
				height:auto;
				-webkit-border-radius: 20px;
				-moz-border-radius: 20px; 
				border-radius: 20px; 
				border:1px solid #54BBFF; 
				background-color:#FFF; 
				-webkit-box-shadow: #B3B3B3 10px 10px 10px; 
				-moz-box-shadow: #999 5px 5px 5px; 
				box-shadow: #998 5px 5px 5px; 
				text-align: center;
			}
			.sheet_img{
				margin-top:15px;"
			}

		</style>

		<div>
			<div>
				<table width="600px" border="0" cellspacing="2" cellpadding="2"> 
					
						@foreach($busines->fields as $field) 
							<td>
								<div class="sheet_fields" >
									
									<img class="sheet_img" type="image/svg" src="/image/football-field.svg" alt="imagen cancha">
													
									<h4> {{$field->id}} </h4>

								</div>
							</td> 
							<br>
						@endforeach
					
				 </table> 
			</div>

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





















