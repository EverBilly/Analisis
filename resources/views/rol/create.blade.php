@extends('index.login')
@section('content')

<div class="container">
		      	<h3>Listado de Roles</h3>
	<table class="table table-hover tabla-usuarios">
	      <thead  class="bg-primary">
	        <th>Nombre</th>
	        <th>Opciones</th>
	      </thead>
	      @foreach($roles as $rol)
	      <tbody>
	        <td>{{ $rol->nombre }}</td>
	        <td>
	        	{!!link_to_route('rol.edit', $title = 'Editar', $parameters = Crypt::encrypt($rol->id), $attributes = ['class' => 'btn btn-warning'])!!}
	        </td>
	      </tbody>
	      @endforeach
	    </table>
	    <br>
	    {!!$roles->render()!!}
	<!--Boton Para Abrir la modal de crear Usuarios-->
	{!!Form::submit('Crear Rol', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#registrar'])!!}
	<!--Inicio de la Modal para Crear Usuarios-->
	<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="inicio" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="inicio">Registro de Roles</h4>
				</div>
				<div class="modal-body">
						{!! Form::open(array('url'=>'rol', 'method'=>'POST')) !!}
							<div class="form-group">
								{!!Form::label('Nombre')!!}
								{!!Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Nombre', 'required'])!!}
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