@extends('index.login')
@section('content')
	{!!Form::submit('Crear Usuario', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#registrar'])!!}

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
								{!!Form::label('Password')!!}
								{!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese El Password', 'required'])!!}
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
					@if(session()->has('msj'))
					<div class="alert alert-success alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>{{session('msj')}}</strong>
					</div>
					@else
					@if(session()->has('error'))
						<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>{{session('error')}}</strong>
					</div>	
					@endif
					@endif
@endsection