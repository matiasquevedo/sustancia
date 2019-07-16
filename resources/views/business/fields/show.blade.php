@extends('business.template.main')

@section('title','Cancha n°:'.$field->id)

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
<div>
	<h3>Cancha N°: {{$field->id}}  <a href="#" class="btn btn-warning">
	Nuevo Turno</a></h3>
	
	@if(count($field->turns)==0)
	<h4><i>No hay Turnos para mostrar</i></h4>
	@else
	{{$field->turns}}
	@endif
</div>
@endsection