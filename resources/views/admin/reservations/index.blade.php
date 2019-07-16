@extends('admin.template.main')

@section('title','Lista de Reservas')

@section('content')


<div class="container">
	<a href=" {{route('reservations.create')}} " class="btn btn-warning">Nuevo Reserva	</a>
	
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Numero de Reserva</th>
	      <th>precioTotal</th>
	      <th>Usuarios</th>
	      <th>Accion</th>
	    </tr>
	  </thead>
	  <tbody>
		@if(count($reservations))
			@foreach($reservations as $reservation)
			<tr>									
				<td>{{$reservation->id}} </td>
				<td> {{$reservation->precioTotal}} </td>
				<td> {{$reservation->user->name}}</td>
				<td> <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('reservation.destroy', $reservation->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>
			</tr>
			@endforeach
		@else

			<tr>
				<td></td>
				<td>No hay reservas para mostrar</td>
				<td></td>
				<td></td>
			</tr>

		@endif

	  	
	  </tbody>
	</table>
	{!! $reservations->render() !!}
	


</div>
@endsection