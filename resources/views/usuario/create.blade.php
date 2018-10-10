@extends('index.login')

@section('content')
	{!! Form::open(array('url'=>'usuario', 'method'=>'POST')) !!}
		<div class="form-group">
			{!!Form::label('Nombre')!!}
			{!!Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Nombre'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Apellido')!!}
			{!!Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Apellido'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Telefono')!!}
			{!!Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese El Telefono'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Password')!!}
			{!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese El Password'])!!}
		</div>

		{!!Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}

		@if(session()->has('msj'))
			<div class="alert alert-success" role="alert">{{ session('msj')}}</div>
		@else
		@if(session()->has('error'))
			<div class="alert alert-danger" role="alert">{{ session('error')}}</div>	
		@endif
		@endif
	{!! Form::close() !!}

@endsection