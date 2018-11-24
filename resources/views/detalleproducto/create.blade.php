@extends('index.login')
@section('content')

<div class="container">
		      	<h3>Listado de Detalle Producto</h3>
	<table class="table table-hover tabla-usuarios">
	      <thead  class="bg-primary">
	        <th>Existencia Minima</th>
	        <th>Existencia Maxima</th>
	        <th>Existencia Actual</th>
	        <th>Entrada</th>
	        <th>Salida</th>
	        <th>Producto</th>
	        <th>Opciones</th>
	      </thead>
	      @foreach($detalles as $detallep)
	      <tbody>
	        <td>{{ $detallep->existencia_minima }}</td>
	        <td>{{ $detallep->existencia_maxima }}</td>
	        <td>{{ $detallep->existencia }}</td>
	        <td>{{ $detallep->entrada }}</td>
	        <td>{{ $detallep->salida }}</td>
	        <td>{{ $detallep->producto }}</td>
	        <td>
	        	{!!link_to_route('detalleproducto.edit', $title = 'Editar', $parameters = Crypt::encrypt($detallep->id), $attributes = ['class' => 'btn btn-warning'])!!}
	        </td>
	      </tbody>
	      @endforeach
	    </table>
	    <br>
	<!--Boton Para Abrir la modal de crear Usuarios-->
	{!!Form::submit('Crear Detalle', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#registrar'])!!}
	<!--Inicio de la Modal para Crear Usuarios-->
	<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="inicio" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="inicio">Registro de Detalle Productos</h4>
				</div>
				<div class="modal-body">
						{!! Form::open(array('url'=>'detalleproducto', 'method'=>'POST')) !!}
							<div class="form-group">
								{!!Form::label('Existencia Minima')!!}
								{!!Form::text('existencia_minima', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Existencia Minima', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Existencia Maxima')!!}
								{!!Form::text('existencia_maxima', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Existencia Maxima', 'required'])!!}
							</div>
							<div class="form-group">
								{!!Form::label('Existencia Actual')!!}
								{!!Form::text('existencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Existencia Actual', 'required'])!!}
							</div>
							<div class="form-group">
							{!!Form::label('Entrada')!!}
							<select name="entrada" class="form-control" required>
							@foreach($entradas as $entrada)
								<option value="{{$entrada->id}}">{{$entrada->descripcion}}</option>
							@endforeach
							</select>
							</div>
							<div class="form-group">
							{!!Form::label('Salida')!!}
							<select name="salida" class="form-control" required>
							@foreach($salidas as $salida)
								<option value="{{$salida->id}}">{{$salida->descripcion}}</option>
							@endforeach
							</select>
							</div>	
							<div class="form-group">
							{!!Form::label('Producto')!!}
							<select name="producto" class="form-control" required>
							@foreach($productos as $producto)
								<option value="{{$producto->id}}">{{$producto->nombre}}</option>
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