@extends('index.login')
@section('content')

<div class="container">
		      	<h3>Listado de Salidas</h3>
	<table class="table table-hover tabla-usuarios">
	      <thead  class="bg-primary">
	        <th>Fecha</th>
	        <th>Descripcion</th>
	        <th>Total</th>
	        <th>Opciones</th>
	      </thead>
	      @foreach($salidas as $salida)
	      <tbody>
	        <td>{{ $salida->fecha }}</td>
	        <td>{{ $salida->descripcion }}</td>
	        <td>{{ $salida->total }}</td>
	        <td>
	        	{!!link_to_route('salida.edit', $title = 'Editar', $parameters = Crypt::encrypt($salida->id), $attributes = ['class' => 'btn btn-warning'])!!}
	        </td>
	      </tbody>
	      @endforeach
	    </table>
	    <br>
	<!--Boton Para Abrir la modal de crear Usuarios-->
	{!!Form::submit('Crear salida', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#registrar'])!!}
	<br>
	<!--Inicio de la Modal para Crear Usuarios-->
	<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="inicio" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="inicio">Registro de Salidas</h4>
				</div>
				<div class="modal-body">
						{!! Form::open(array('url'=>'salida', 'method'=>'POST')) !!}
							<div class="form-group">
								{!!Form::label('Fecha')!!}
								{!!Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Fecha'])!!}
								{!!Form::label('descripcion')!!}
								{!!Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Descripcion'])!!}
								{!!Form::label('total')!!}
								{!!Form::text('total', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Total'])!!}
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
@endsection
<!-- 
							<div class="form-group">
								{!! Form::date('nombre') !!}
							</div> -->