@extends('admin.template.main')

@section('title','Nueva Notificacion')

@section('content')
<div class="container">
	<h3>Nueva notificacion</h3>
	{!! Form::open(['route'=>'notifications.store', 'method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::label('title','Titulo') !!}
			{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('setBody','Cuerpo') !!}
			{!! Form::text('setBody',null,['class'=>'form-control','placeholder'=>'Cuerpo','required']) !!}
		</div>

		  <div class="form-group">
		      {!! Form::label('topic','Enviar a:') !!}
		      {!! Form::select('topic',config('multiple.topics'),null,['class'=>'form-control','placeholder'=>'Seleccione una opción...','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Enviar',['class'=>'btn btn-primary']) !!}
		</div>



	{!! Form::close() !!}
</div>
@endsection