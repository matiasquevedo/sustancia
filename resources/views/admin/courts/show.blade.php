@extends('admin.template.main')

@section('title','Cancha n°: '.$field->id)

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
	<h3>Cancha n°: {{$field->id}}</h3>
	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
			Nueva Turno
		</button>
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLongTitle"> Agregar Cancha  <a style="float: right" data-dismiss="modal" class="btn btn-danger" > <i class="glyphicon glyphicon-remove"></i> </a> </h3>


					</div>
					<div class="modal-body">

						<div>

							{!! Form::open(['route'=>'turns.store', 'method'=>'POST']) !!}
			<div class="form-group" style="display: none">
			{!! Form::text('field_id',$field->id,null,['class'=>'form-control select-category','required']) !!}
			</div>

			<div class="form-group">
			      {!! Form::label('fecha','Día') !!}
			      {!! Form::select('fecha',config('multiple.dias'),null,['class'=>'form-control select-category','placeholder'=>'Seleccione una opción...','required']) !!}
			</div>

			<div class="form-group">
			      {!! Form::label('hora','Turno') !!}
			      {!! Form::select('hora',config('multiple.horas'),null,['class'=>'form-control select-category','placeholder'=>'Seleccione una opción...','required']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
			</div>



		{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	<div>
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th>Numero de Turno</th>
		      <th>Fecha</th>
		      <th>Hora</th>
		      <th>Estado</th>
		      <th>Accion</th>
		    </tr>
		  </thead>
		  <tbody>
			@if(empty($field->turns))
				<tr>
					<td></td>
					<td>No hay empresas para mostrar</td>
					<td></td>
					<td></td>
				</tr>
			@else
				@foreach($field->turns as $turn)
				<tr>									
					<td><a href="#">{{$turn->id}}</a>  </td>
					<td> {{$turn->fecha}} </td>
					<td> {{$turn->hora}} </td>
					<td> {{$turn->state}} </td>
					<td> <a href="{{ route('turns.edit', $turn->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('turn.destroy', $turn->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>
				</tr>
				@endforeach
			@endif

		  	
		  </tbody>
		</table>
	</div>

</div>
@endsection


