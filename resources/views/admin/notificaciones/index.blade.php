@extends('admin.template.main')

@section('title','Lista de Notificaciones')

@section('content')
<div class="container">
	<h3>Lista de notificaciones</h3>
	<a href="{{route('notifications.create')}}" class="btn btn-info">Nueva Notificacion</a>
	<div class="mt-3">	
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th>id</th>
		      <th>Titulo</th>
		      <th>Cuerpo</th>
		      <th>Enviado a:</th>
		      <th>Enviado por:</th>
		      <th>Fecha y Hora</th>
		    </tr>
		  </thead>
		  <tbody>
			@if(empty($notifications))
				<tr>
					<td></td>
					<td>No hay notificaciones</td>
					<td></td>
					<td></td>
				</tr>
			@else
				@foreach($notifications as $notificacion)
				<tr>
					<td>{{$notificacion->id}}</td>
					<td>{{$notificacion->title}}</td>
					<td>{{$notificacion->body}}</td>
					@if($notificacion->topic == 'all')
						<td>Todos</td>
					@endif
					<td>{{$notificacion->user->name}}</td>
					<td>{{$notificacion->created_at}}</td>
				</tr>
				@endforeach
			@endif

		  	
		  </tbody>
		</table>
		{!! $notifications->render() !!}
	</div>
</div>
@endsection