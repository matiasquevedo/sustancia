@extends('admin.template.main')

@section('title','Editar Reserva N°:'.$reservation->id)

@section('content')


<div class="container">
	
	<h3>Editar Reserva N°: {{$reservation->id}}</h3>
	{!! Form::open(['route'=>['reservations.update',$reservation], 'method'=>'PUT']) !!}

		<div class="form-group">
		      {!! Form::label('precioTotal','Precio Total') !!}
		      {!! Form::text('precioTotal',$reservation->precioTotal,['class'=>'form-control','placeholder'=>'Precio Total','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
		</div>



	{!! Form::close() !!}


</div>

@endsection 