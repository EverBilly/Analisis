@extends('index.login')
@section('content')
	<!--Formulario para Editar Usuarios-->
	<div class="container">
		{!! Form::model($marca, ['route' => ['marca.update', $marca -> id], 'method' => 'PUT']) !!}
			<div class="form-group">
				{!!Form::label('Nombre')!!}
				{!!Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Nombre', 'required'])!!}
			</div>
			<div class="modal-footer">
			{!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
			{!!link_to('marca/create', $title = 'Cancelar', $attributes = ['class' => 'btn btn-warning'], $secure = null)!!}
			</div>
		{!! Form::close() !!}
	</div>
  <!--Fin de formulario para Editar Ususarios-->

  <!--Boton para eliminar Usuarios-->
  	<div class="container">
		{!! Form::open(['route' => ['marca.destroy', Crypt::encrypt($marca -> id)], 'method' => 'DELETE']) !!}
			{!!Form::submit('Eliminar', ['class' => 'btn btn-danger'])!!}
		{!! Form::close() !!}
	</div>
	<!--Fin Boton para eliminar Usuarios-->

	<!-- Div que muestra las alertas-->
	<div class="container">
		@include('alerts.alertas')
	</div>
	<!-- Fin Div que muestra las alertas-->
@endsection