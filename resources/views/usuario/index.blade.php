@extends('index.login')
@section('content')
  <table class="table table-hover tabla-usuarios">
        <thead  class="bg-primary">
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Telefono</th>
          <th>Rol</th>
          <th>Opciones</th>
        </thead>
        @foreach($usuarios as $usuario)
        <tbody>
          <td>{{ $usuario->nombre }}</td>
          <td>{{ $usuario->apellido }}</td>
          <td>{{ $usuario->telefono }}</td>
          <td>{{ $usuario->rol }}</td>
          <td>
            {!!link_to_route('usuario.edit', $title = 'Editar', $parameters = Crypt::encrypt($usuario->id), $attributes = ['class' => 'btn btn-warning'])!!}
          </td>
        </tbody>
        @endforeach
      </table>
@endsection