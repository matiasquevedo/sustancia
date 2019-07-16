@extends('admin.template.main')

@section('title','New Booking')

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
	<h3>New Booking</h3>
	{!! Form::open(['route'=>'bookings.store', 'method'=>'POST']) !!}
		<div class="form-group">
		{!! Form::label('turn_id','Turno*') !!}
		{!! Form::select('turn_id',$turns,null,['class'=>'form-control select-category','required']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('reservation_id','Reserva*') !!}
		{!! Form::select('reservation_id',$reservations,null,['class'=>'form-control select-category','required']) !!}
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