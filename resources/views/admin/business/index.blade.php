@extends('admin.template.main')

@section('title','Lista de Negocios')

@section('content')


<div class="container">
		<a href=" {{route('markets.create')}} " class="btn btn-warning">Nueva Empresa</a>
		
		<table class="table table-striped">
		  <thead>
		    <tr>
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
					<td><a href="{{ route('markets.show', $busines->id) }}">{{$busines->name}}</a>  </td>
					<td> {{$busines->ubicacion}} </td>
					<td> {{$busines->locality}} </td>
					<td> {{$busines->subAdministrativeArea}} </td>
					<td>
						@if($busines->state=='0')
							<span class="badge badge-danger">Sin Publicar</span>
						@elseif($busines->state=='1')
							<span class="badge badge-success">Publicado</span>
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
@endsection