@extends('admin.template.main')

@section('title','Bookings')

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
	<a href=" {{route('bookings.create')}} " class="btn btn-warning">New Bookings</a>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Turno</th>
	      <th>Reserva</th>
	      <th>Accion</th>
	    </tr>
	  </thead>
	  <tbody>
		@if(empty($bookings))
			<tr>
				<td></td>
				<td>No hay bookings para mostrar</td>
				<td></td>
				<td></td>
			</tr>
		@else
			@foreach($bookings as $booking)
			<tr>									
				<td>{{$booking->id}}</td>
				<td> {{$booking->turn_id}} </td>
				<td> {{$booking->reservation_id}} </td>
				<td> <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('bookings.destroy', $booking->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>
			</tr>
			@endforeach
		@endif

	  	
	  </tbody>
	</table>
	{!! $bookings->render() !!}


</div>
@endsection