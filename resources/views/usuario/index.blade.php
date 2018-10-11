@extends('index.login')

@section('content')
    <table class="table">
      <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
      </thead>
      @foreach($usuarios as $usuario)
      <tbody>
        <td>{{ $usuario->nombre }}</td>
        <td>{{ $usuario->apellido }}</td>
        <td>{{ $usuario->telefono }}</td>
      </tbody>
      @endforeach
    </table>
@endsection
