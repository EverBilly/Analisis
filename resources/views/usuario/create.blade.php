@extends('index.login')
@section('content')

<div class="container">
		      	<h3>Listado de Usuarios</h3>
	<table class="table table-hover tabla-usuarios">
	      <thead  class="bg-primary">
	        <th>Nombre</th>
	        <th>Apellido</th>
	        <th>Telefono</th>
	        <th>Email</th>
	        <th>Rol</th>
	        <th>Opciones</th>
	      </thead>
	      @foreach($usuarios as $usuario)
	      <tbody>
	        <td>{{ $usuario->nombre }}</td>
	        <td>{{ $usuario->apellido }}</td>
	        <td>{{ $usuario->telefono }}</td>
	        <td>{{ $usuario->email }}</td>
	        <td>{{ $usuario->rol }}</td>
	        <td>
	        	{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = Crypt::encrypt($usuario->id), $attributes = ['class' => 'btn btn-warning'])!!}
	        </td>
	      </tbody>
	      @endforeach
	    </table>
	    <br>
	<!--Boton Para Abrir la modal de crear Usuarios-->
	{!!Form::submit('Crear Usuario', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#registrar'])!!}
	<br>
	{!!$usuarios->render()!!}
	<!--Inicio de la Modal para Crear Usuarios-->
	<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="inicio" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="inicio">Registro de Usuarios</h4>
				</div>
				<div class="modal-body">
						{!! Form::open(array('url'=>'usuario', 'method'=>'POST')) !!}
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
								{!!Form::label('Password')!!}
								{!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese El Password', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Rol')!!}
								<select name="rol" class="form-control">
								@foreach($roles as $rol)
									<option value="{{$rol->id}}">{{$rol->nombre}}</option>
								@endforeach
							</select>
							</div>
							<div class="modal-footer">
							{!!Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
							{!!Form::submit('Cancelar', ['class' => 'btn btn-danger', 'data-dismiss' => 'modal'])!!}
							</div>

						{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
  </div>
  <!--Fin de la modal para crear Ususarios-->

		<!-- Div que muestra las alertas-->
			<div class="container">
				@include('alerts.alertas')
			</div>
		<!-- Fin Div que muestra las alertas-->
@endsection