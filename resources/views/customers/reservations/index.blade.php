@extends('customers.template.main')

@section('title','Mis Reservas')

@section('content')
	<h3>todo peola con las reservas</h3>
	@if(count($reservations)==0)
		<p><i>No hay reservas</i></p>
	@else
		{{$reservations}}
	@endif
@endsection