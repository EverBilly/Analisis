@extends('index.login')
@section('content')
	<!--Formulario para Editar Usuarios-->
	<div class="container">
		{!! Form::model($salida, ['route' => ['salida.update', $salida -> id], 'method' => 'PUT']) !!}
			{!!Form::label('Fecha')!!}
			{!!Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Fecha'])!!}
			{!!Form::label('descripcion')!!}
			{!!Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Descripcion'])!!}
			{!!Form::label('total')!!}
			{!!Form::text('total', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Total'])!!}
			<div class="modal-footer">
			{!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
			{!!link_to('salida/create', $title = 'Cancelar', $attributes = ['class' => 'btn btn-warning'], $secure = null)!!}
			</div>
		{!! Form::close() !!}
	</div>
  <!--Fin de formulario para Editar Ususarios-->

  <!--Boton para eliminar Usuarios-->
  	<div class="container">
		{!! Form::open(['route' => ['salida.destroy', Crypt::encrypt($salida -> id)], 'method' => 'DELETE']) !!}
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