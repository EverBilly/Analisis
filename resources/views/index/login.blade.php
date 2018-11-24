<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/menu.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/login.css') !!}

</head>
    <title>Inicio</title>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{url('/')}}">Bienvenido</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      @if (Auth::guest())
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
      @else

      <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expended="false"><span class="glyphicon glyphicon-user"></span> 
          {{Auth::user()->name}}
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesion</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>
          </ul>
      </li>
      @endif
    </ul>
  </div>
</nav>
    @yield('content') 

    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/obtener.js') !!}
</body>
</html>