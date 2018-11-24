@extends('index.login')
@section('content')
	<!--Formulario para Editar Usuarios-->
	<div class="container">
		{!! Form::model($producto, ['route' => ['producto.update', $producto -> id], 'method' => 'PUT']) !!}
			<div class="form-group">
								{!!Form::label('Nombre')!!}
								{!!Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Nombre', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Descripcion')!!}
								{!!Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Descripcion', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Precio1')!!}
								{!!Form::text('precio1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Precio1', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Precio2')!!}
								{!!Form::text('precio2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Precio2', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Precio3')!!}
								{!!Form::text('precio3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Precio3', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Precio4')!!}
								{!!Form::text('precio4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Precio4', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Precio Anterior')!!}
								{!!Form::text('precio_anterior', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Precio Anterior', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Precio Actual')!!}
								{!!Form::text('precio_actual', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Precio Actual', 'required'])!!}
							</div>
			<div class="modal-footer">
			{!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
			{!!link_to('producto/create', $title = 'Cancelar', $attributes = ['class' => 'btn btn-warning'], $secure = null)!!}
			</div>
		{!! Form::close() !!}
	</div>
  <!--Fin de formulario para Editar Ususarios-->

  <!--Boton para eliminar Usuarios-->
  	<div class="container">
		{!! Form::open(['route' => ['producto.destroy', Crypt::encrypt($producto -> id)], 'method' => 'DELETE']) !!}
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