@extends('admin.template.main')

@section('title','Editar usuario: '.$user->name)

@section('content')
<div class="container">
	<h3>Editar Usuario: {{$user->name}} </h3>

	{!! Form::open(['route'=>['users.update', $user->id], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email','Email') !!}
			{!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'nombre@server.com','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('type','Tipo Usuario') !!}
			{!! Form::select('type',[''=>'Seleccione Tipo de Usuario' ,'encargado'=>'Encargado','admin'=>'Administrador','cliente'=>'Cliente'],$user->type,['class'=>'form-control','placeholder'=>'Seleccione una opción...','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
		</div>


	{!! Form::close() !!}
</div>
@endsection