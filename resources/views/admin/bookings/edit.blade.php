@extends('admin.template.main')

@section('title','Edit Booking n°:'.$booking->id)

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
	<h3>Edit Booking</h3>

	{!! Form::open(['route'=>['bookings.update', $booking->id], 'method'=>'PUT']) !!}
		<div class="form-group">
		{!! Form::label('turn_id','Turno*') !!}
		{!! Form::select('turn_id',$turns,$booking->turn_id,['class'=>'form-control select-category','required']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('reservation_id','Reserva*') !!}
		{!! Form::select('reservation_id',$reservations,$booking->reservation_id,['class'=>'form-control select-category','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
		</div>


	{!! Form::close() !!}


</div>
@endsection
