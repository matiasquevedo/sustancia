@extends('admin.template.main')

@section('title','Lista de Negocios')

@section('content')


<div class="container">
	<a href=" {{route('markets.create')}} " class="btn btn-warning">Nueva Empresa</a>
	<div class="row">
		
		<div class="col-md-10">
			{!! Form::open(['route'=>'productos.varios', 'method'=>'GET','files'=>'true']) !!}		
			<table class="table table-striped">
			  <thead>
			    <tr>
			    	<th></th>
			      <th>Nombre</th>
			      <th>Ubicacion</th>
			      <th>Localidad</th>
			      <th>Area</th>
			      <th>Estado</th>
			      <th>Accion</th>
			    </tr>
			  </thead>
			  <tbody>
				@if(empty($business))
					<tr>
						<td></td>
						<td>No hay empresas para mostrar</td>
						<td></td>
						<td></td>
					</tr>
				@else
					@foreach($business as $busines)
					<tr>			
						<td>{{ Form::checkbox('box[]',$busines->id, null, ['class' => 'field']) }}</td>			
						<td><a href="{{ route('markets.show', $busines->id) }}">{{$busines->name}}</a>  </td>
						<td> {{$busines->ubicacion}} </td>
						<td> {{$busines->locality}} </td>
						<td> {{$busines->subAdministrativeArea}} </td>
						<td>
							@if($busines->state=='0')
								<span class="badge badge-danger" style="background-color: #dc3545 !important;">Sin Publicar</span>
							@elseif($busines->state=='1')
								<span class="badge badge-success" style="background-color: #28a745 !important;">Publicado</span>
							@endif
						</td>
						<td> <a href="{{ route('markets.edit', $busines->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('markets.destroy', $busines->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>
					</tr>
					@endforeach
				@endif

			  	
			  </tbody>
			</table>
			{!! $business->render() !!}
		</div>
		<div class="col-md-2">
			  <div class="form-group div-fijo">
			      {!! Form::label('act','Acción Multiple') !!}
			      {!! Form::select('act',config('multiple.opciones'),null,['class'=>'form-control','placeholder'=>'Seleccione una opción...','required']) !!}
			      {!! Form::submit('Ir',['class'=>'btn btn-primary']) !!}
			</div>
		</div>
	</div>		
		 	
</div>


@endsection