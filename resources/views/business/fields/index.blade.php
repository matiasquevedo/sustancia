@extends('admin.template.main')

@section('title','Canchas')

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
	<a href=" {{route('courts.create')}} " class="btn btn-warning">Nueva Cancha</a>
	
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Id</th>
	      <th>Empresa</th>
	      <th>Precio</th>
	      <th>Accion</th>
	    </tr>
	  </thead>
	  <tbody>
		@if(empty($courts))
			<tr>
				<td></td>
				<td>No hay empresas para mostrar</td>
				<td></td>
				<td></td>
			</tr>
		@else
			@foreach($courts as $court)
			<tr>									
				<td><a href="{{ route('courts.show', $court->id) }}">{{$court->id}}</a>  </td>
				<td> {{$court->busines->name}} </td>
				<td> {{$court->precio}} </td>
				<td> <a href="{{ route('courts.edit', $court->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('court.destroy', $court->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>
			</tr>
			@endforeach
		@endif

	  	
	  </tbody>
	</table>
	{!! $courts->render() !!}

</div>
@endsection