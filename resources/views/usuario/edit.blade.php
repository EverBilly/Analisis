@extends('index.login')
@section('content')
	<!--Inicio de la Modal para Editar Usuarios-->
	<div class="container">
		{!! Form::model($usuario, ['route' => ['usuario.update', $usuario -> id], 'method' => 'PUT']) !!}
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
			<div class="modal-footer">
			{!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
			{!!link_to('usuario/create', $title = 'Cancelar', $attributes = ['class' => 'btn btn-warning'], $secure = null)!!}
			</div>
		{!! Form::close() !!}
	</div>
  <!--Fin de la modal para Editar Ususarios-->

  	<div class="container">
		{!! Form::open(['route' => ['usuario.destroy', Crypt::encrypt($usuario -> id)], 'method' => 'DELETE']) !!}
			{!!Form::submit('Eliminar', ['class' => 'btn btn-danger'])!!}
		{!! Form::close() !!}
	</div>

    @if(session()->has('msj'))
		<div class="container">
      		<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
      			<strong>{{session('msj')}}</strong>					
      		</div>
    	</div>
	@else
	@if(session()->has('error'))
		<div class="container">
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>{{session('error')}}</strong>
				</div>	
		</div>
	@endif
	@endif
@endsection