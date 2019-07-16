@extends('admin.template.main')

@section('title','Nueva Cancha')

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
	<h3>Nueva Cancha</h3>

	
	{!! Form::open(['route'=>'fields.store', 'method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::label('cantidad_jugadores','Cantidad de Jugadores*') !!}
			{!! Form::text('cantidad_jugadores',null,['class'=>'form-control','placeholder'=>'Cantidad de Jugadores','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('precio','Precio*') !!}
			{!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'Precio','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
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