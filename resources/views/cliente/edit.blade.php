@extends('index.login')
@section('content')
	<!--Formulario para Editar clientes-->
	<div class="container">
		{!! Form::model($cliente, ['route' => ['cliente.update', $cliente -> id], 'method' => 'PUT']) !!}
			<div class="form-group">
				{!!Form::label('Nombre')!!}
				{!!Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Nombre', 'required'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('Apellido')!!}
				{!!Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Apellido', 'required'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('Telefono')!!}
				{!!Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Telefono', 'required'])!!}
			</div>
			<div class="form-group">
			{!!Form::label('Email')!!}
			{!!Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Email', 'required'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Direccion')!!}
			{!!Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Direccion', 'required'])!!}
		</div>
			<div class="form-group">
			<select name="rol" class="form-control" required>
			<option>{{$cliente->rol}}</option>
			</select>
			</div>
			<div class="modal-footer">
			{!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
			{!!link_to('cliente/create', $title = 'Cancelar', $attributes = ['class' => 'btn btn-warning'], $secure = null)!!}
			</div>
		{!! Form::close() !!}
	</div>
  <!--Fin de formulario para Editar Ususarios-->

  <!--Boton para eliminar clientes-->
  	<div class="container">
		{!! Form::open(['route' => ['cliente.destroy', Crypt::encrypt($cliente -> id)], 'method' => 'DELETE']) !!}
			{!!Form::submit('Eliminar', ['class' => 'btn btn-danger'])!!}
		{!! Form::close() !!}
	</div>
	<!--Fin Boton para eliminar clientes-->

	<!-- Div que muestra las alertas-->
	<div class="container">
		@include('alerts.alertas')
	</div>
	<!-- Fin Div que muestra las alertas-->
@endsection