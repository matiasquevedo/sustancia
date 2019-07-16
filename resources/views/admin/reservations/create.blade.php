@extends('admin.template.main')

@section('title','Nueva Reserva')

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
	<h3>Nueva Reserva</h3>
		{!! Form::open(['route'=>'reservations.store', 'method'=>'POST']) !!}

			<div class="form-group">
			      {!! Form::label('precioTotal','Precio Total') !!}
			      {!! Form::text('precioTotal',null,['class'=>'form-control','placeholder'=>'Precio Total','required']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
			</div>



		{!! Form::close() !!}

	</div>
</div>

@endsection