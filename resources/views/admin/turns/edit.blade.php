@extends('admin.template.main')

@section('title','Editar Turno n°:' .$turn->id)

@section('content')
<div class="container">
	<h3>Editar turno n°: {{$turn->id}} </h3>
		{!! Form::open(['route'=>['turns.update',$turn], 'method'=>'PUT']) !!}

			<div class="form-group">
			      {!! Form::label('fecha','Día') !!}
			      {!! Form::select('fecha',config('multiple.dias'),$turn->fecha,['class'=>'form-control select-category','placeholder'=>'Seleccione una opción...','required']) !!}
			</div>

			<div class="form-group">
			      {!! Form::label('hora','Turno') !!}
			      {!! Form::select('hora',config('multiple.horas'),$turn->hora,['class'=>'form-control select-category','placeholder'=>'Seleccione una opción...','required']) !!}
			</div>

			<div class="form-group">
			      {!! Form::label('state','Estado') !!}
			      {!! Form::select('state',config('multiple.state'),$turn->state,['class'=>'form-control select-category','placeholder'=>'Seleccione una opción...','required']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
			</div>



		{!! Form::close() !!}

	</div>
	@endsection

	@section('js')
		<script>

			$('.select-category').chosen({
				placeholder_text_multiple:'Seleccione al menos 3 tags',
				no_results_text: "Oops, no hay categoria parecida a ",
				search_contains:true,

			});

			$('#trumbowyg-demo').trumbowyg();
			$('#trumbowyg-demo2').trumbowyg();

			document.getElementById("upload").onchange = function() {
				var reader = new FileReader(); //instanciamos el objeto de la api FileReader

	  			reader.onload = function(e) {
	    		document.getElementById("image").src = e.target.result;
	  			};

	  		// read the image file as a data URL.
	  		reader.readAsDataURL(this.files[0]);
			};

			function limite_textarea(valor) {   
	    		total = valor.length;
	        	document.getElementById('cont').innerHTML = total;
			}

			

			
		</script>

	@endsection