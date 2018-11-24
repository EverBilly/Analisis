@extends('index.login')
@section('content')

<div class="container">
		      	<h3>Listado de Productos</h3>
	<table class="table table-hover tabla-usuarios">
	      <thead  class="bg-primary">
	        <th>Nombre</th>
	        <th>Descripcion</th>
	        <th>Precio1</th>
	        <th>Precio2</th>
	        <th>Precio3</th>
	        <th>Precio4</th>
	        <th>Precio Anterior</th>
	        <th>Precio Actual</th>
	        <th>Categoria</th>
	        <th>Medida</th>
	        <th>Marca</th>
	        <th>Opciones</th>
	      </thead>
	      @foreach($productos as $producto)
	      <tbody>
	        <td>{{ $producto->nombre }}</td>
	        <td>{{ $producto->descripcion }}</td>
	        <td>{{ $producto->precio1 }}</td>
	        <td>{{ $producto->precio2 }}</td>
	        <td>{{ $producto->precio3 }}</td>
	        <td>{{ $producto->precio4 }}</td>
	        <td>{{ $producto->precio_anterior }}</td>
	        <td>{{ $producto->precio_actual }}</td>
	        <td>{{ $producto->categoria }}</td>
	        <td>{{ $producto->medida }}</td>
	        <td>{{ $producto->marca }}</td>
	        <td>
	        	{!!link_to_route('producto.edit', $title = 'Editar', $parameters = Crypt::encrypt($producto->id), $attributes = ['class' => 'btn btn-warning'])!!}
	        </td>
	      </tbody>
	      @endforeach
	    </table>
	    <br>
	<!--Boton Para Abrir la modal de crear Usuarios-->
	{!!Form::submit('Crear Producto', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#registrar'])!!}
	<!--Inicio de la Modal para Crear Usuarios-->
	<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="inicio" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="inicio">Registro de Productos</h4>
				</div>
				<div class="modal-body">
						{!! Form::open(array('url'=>'producto', 'method'=>'POST')) !!}
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
							<div class="form-group">
								{!!Form::label('Categoria')!!}
								<select name="categoria" class="form-control" required>
								@foreach($categorias as $categoria)
									<option value="{{$categoria->id}}" >{{$categoria->categoria}}</option>
								@endforeach
							</select>
							</div>
							<div class="form-group">
								{!!Form::label('Medida')!!}
								<select name="medida" class="form-control" required>
								@foreach($medidas as $medida)
									<option value="{{$medida->id}}">{{$medida->medida}}</option>
								@endforeach
							</select>
							</div>
							<div class="form-group">
								{!!Form::label('Marca')!!}
								<select name="marca" class="form-control" required>
								@foreach($marcas as $marca)
									<option value="{{$marca->id}}">{{$marca->marca}}</option>
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