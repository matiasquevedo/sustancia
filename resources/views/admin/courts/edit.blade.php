@extends('admin.template.main')

@section('title','Editar Cancha n°:'.$court->id)

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
	<h3>Editar Cancha n°: {{$court->id}} </h3>
	{!! Form::open(['route'=>['courts.update',$court], 'method'=>'PUT']) !!}

		<div class="form-group">
			{!! Form::label('cantidad_jugadores','Cantidad de Jugadores*') !!}
			{!! Form::text('cantidad_jugadores',$court->cantidad_jugadores,['class'=>'form-control','placeholder'=>'Cantidad de Jugadores','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('precio','Precio*') !!}
			{!! Form::text('precio',$court->precio,['class'=>'form-control','placeholder'=>'Precio','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
		</div>



	{!! Form::close() !!}

</div>
@endsection