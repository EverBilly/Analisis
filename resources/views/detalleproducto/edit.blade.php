@extends('index.login')
@section('content')
	<!--Formulario para Editar Usuarios-->
	<div class="container">
		{!! Form::model($detalleproducto, ['route' => ['detalleproducto.update', $detalleproducto -> id], 'method' => 'PUT']) !!}
			<div class="form-group">
								{!!Form::label('Existencia Minima')!!}
								{!!Form::text('existencia_minima', null, ['class' => 'form-control', 'placeholder' => 'Ingrese La Existencia Minima', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Existencia Maxima')!!}
								{!!Form::text('existencia_maxima', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Existencia Maxima', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Existencia')!!}
								{!!Form::text('existencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Existencia', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Entrada')!!}
								{!!Form::text('entrada', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Entrada', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Salida')!!}
								{!!Form::text('salida', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Salida', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Producto')!!}
								{!!Form::text('producto', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Producto', 'required'])!!}
							</div>
			<div class="modal-footer">
			{!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
			{!!link_to('detalleproducto/create', $title = 'Cancelar', $attributes = ['class' => 'btn btn-warning'], $secure = null)!!}
			</div>
		{!! Form::close() !!}
	</div>
  <!--Fin de formulario para Editar Ususarios-->

  <!--Boton para eliminar Usuarios-->
  	<div class="container">
		{!! Form::open(['route' => ['detalleproducto.destroy', Crypt::encrypt($detalleproducto -> id)], 'method' => 'DELETE']) !!}
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