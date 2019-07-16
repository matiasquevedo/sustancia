@extends('admin.template.main')

@section('title','Lista de Turnos')

@section('content')


<div class="container">
	<a href=" {{route('turns.create')}} " class="btn btn-warning">Nuevo Turno</a>
	
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Numero de Turno</th>
	      <th>Empresa</th>
	      <th>Numero de Cancha</th>
	      <th>Fecha</th>
	      <th>Hora</th>
	      <th>Estado</th>
	      <th>Accion</th>
	    </tr>
	  </thead>
	  <tbody>
		@if(empty($turns))
			<tr>
				<td></td>
				<td>No hay empresas para mostrar</td>
				<td></td>
				<td></td>
			</tr>
		@else
			@foreach($turns as $turn)
			<tr>									
				<td>{{$turn->id}} </td>
				<td> {{$turn->field->busines->name}} </td>
				<td> {{$turn->field->id}} </td>
				<td> {{$turn->fecha}} </td>
				<td> {{$turn->hora}} </td>
				<td> {{$turn->state}} </td>
				<td> <a href="{{ route('turns.edit', $turn->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('turn.destroy', $turn->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>
			</tr>
			@endforeach
		@endif

	  	
	  </tbody>
	</table>
	{!! $turns->render() !!}
	














	
</div>
@endsection