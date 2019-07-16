@extends('admin.template.main')

@section('title','Lista de Negocios')

@section('content')


<div class="container">
		<a href=" {{route('business.create')}} " class="btn btn-warning">Nueva Empresa</a>
		
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th>Nombre</th>
		      <th>Ubicacion</th>
		      <th>Usuario Responsable</th>
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
					<td><a href="{{ route('business.show', $busines->id) }}">{{$busines->name}}</a>  </td>
					<td> {{$busines->ubicacion}} </td>
					<td> {{$busines->user->name}} </td>
					<td> <a href="{{ route('business.edit', $busines->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('business.destroy', $busines->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>
				</tr>
				@endforeach
			@endif

		  	
		  </tbody>
		</table>
		{!! $business->render() !!}
	
</div>
@endsection