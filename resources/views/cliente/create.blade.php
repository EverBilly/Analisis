@extends('index.login')
@section('content')

<div class="container">
	<h3>Listado de Clientes</h3>
	<table class="table table-hover tabla-clientes">
	      <thead  class="bg-primary">
	        <th>Nombre</th>
	        <th>Apellido</th>
	        <th>Telefono</th>
	        <th>Email</th>
	        <th>Direccion</th>
	        <td>Municipio</td>
	        <th>Opciones</th>
	      </thead>
	      @foreach($clientes as $cliente)
	      <tbody>
	        <td>{{ $cliente->nombre }}</td>
	        <td>{{ $cliente->apellido }}</td>
	        <td>{{ $cliente->telefono }}</td>
	        <td>{{ $cliente->email }}</td>
	        <td>{{ $cliente->direccion }}</td>
	        <td>{{ $cliente->municipio}}</td>
	        <td>
	        	{!!link_to_route('cliente.edit', $title = 'Editar', $parameters = Crypt::encrypt($cliente->id), $attributes = ['class' => 'btn btn-warning'])!!}
	        </td>
	      </tbody>
	      @endforeach
	    </table>
	    <br>
	<!--Boton Para Abrir la modal de crear clientes-->
	{!!Form::submit('Crear Cliente', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#registrar'])!!}
	<br>

	<!--Inicio de la Modal para Crear clientes-->
	<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="inicio" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="inicio">Registro de Clientes</h4>
				</div>
				<div class="modal-body">
						{!! Form::open(array('url'=>'cliente', 'method'=>'POST')) !!}
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
								{!!Form::label('Municipio')!!}
								<select name="municipio" class="form-control">
								@foreach($municipios as $municipio)
									<option value="{{$municipio->id}}">{{$municipio->municipio}}</option>
								@endforeach
							</select>
							</div>
							<div class="form-group">
								{!!Form::label('Departamento')!!}
								<select name="departamento" class="form-control">
								@foreach($departamentos as $departamento)
									<option value="{{$departamento->id}}">{{$departamento->departamento}}</option>
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