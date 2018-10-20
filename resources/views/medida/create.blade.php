@extends('index.login')
@section('content')

<div class="container">
		      	<h3>Listado de Medidas</h3>
	<table class="table table-hover tabla-usuarios">
	      <thead  class="bg-primary">
	        <th>Medida</th>
	        <th>Opciones</th>
	      </thead>
	      @foreach($medidas as $medida)
	      <tbody>
	        <td>{{ $medida->medida }}</td>
	        <td>
	        	{!!link_to_route('medida.edit', $title = 'Editar', $parameters = Crypt::encrypt($medida->id), $attributes = ['class' => 'btn btn-warning'])!!}
	        </td>
	      </tbody>
	      @endforeach
	    </table>
	    <br>
	    {!!$medidas->render()!!}
	<!--Boton Para Abrir la modal de crear Usuarios-->
	{!!Form::submit('Crear Medida', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#registrar'])!!}
	<!--Inicio de la Modal para Crear Usuarios-->
	<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="inicio" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="inicio">Registro de Medidas</h4>
				</div>
				<div class="modal-body">
						{!! Form::open(array('url'=>'medida', 'method'=>'POST')) !!}
							<div class="form-group">
								{!!Form::label('Medida')!!}
								{!!Form::text('medida', null, ['class' => 'form-control', 'placeholder' => 'Ingrese La Medida', 'required'])!!}
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