@extends('index.login')
@section('content')
	<!--Formulario para Editar Usuarios-->
	<div class="container">
		{!! Form::model($medida, ['route' => ['medida.update', $medida -> id], 'method' => 'PUT']) !!}
			<div class="form-group">
				{!!Form::label('Nombre Medida')!!}
				{!!Form::text('medida', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Nombre', 'required'])!!}
			</div>
			<div class="modal-footer">
			{!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
			{!!link_to('medida/create', $title = 'Cancelar', $attributes = ['class' => 'btn btn-warning'], $secure = null)!!}
			</div>
		{!! Form::close() !!}
	</div>
  <!--Fin de formulario para Editar Ususarios-->

  <!--Boton para eliminar Usuarios-->
  	<div class="container">
		{!! Form::open(['route' => ['medida.destroy', Crypt::encrypt($medida -> id)], 'method' => 'DELETE']) !!}
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