@extends('index.login')
@section('content')
  
  <!--Inicio de la Modal para Editar Usuarios-->
  <div class="container">
    {!! Form::open(['route' => ['usuario.destroy', Crypt::encrypt($usuario -> id]), 'method' => 'DELETE']) !!}
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
      {!!link_to('usuario/create', $title = 'Cancelar', $attributes = ['class' => 'btn btn-danger'], $secure = null)!!}
      </div>
    {!! Form::close() !!}
  </div>
  <!--Fin de la modal para Editar Ususarios-->

    <!-- Div que muestra las alertas-->
      <div class="container">
        @include('alerts.alertas')
      </div>
    <!-- Fin Div que muestra las alertas-->
@endsection