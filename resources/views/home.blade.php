@extends('index.login')

@section('content')
      <div class="container">
        @include('alerts.alertas')
      </div>
<div class="row-offcanvas row-offcanvas-left">
  <div id="sidebar" class="sidebar-offcanvas">
      <div class="col-md-12">
        <h3>Menu Principal</h3>
        <ul class="nav nav-pills nav-stacked">
        @if(Auth::user()->rol == 1)

          <li><a href="{{ url('rol/create') }}"><span class="fa fa-user-circle-o"></span> Roles</a></li>
          
          <!--Lista desplegable de los usuarios-->
          <li data-toggle="collapse" data-target="#usuarios" class="collapsed"><a href="#"><span class="fa fa-user"></span> Usuarios <span class="caret"></span></a></li>

          <ul class="sub-menu collapse" id="usuarios">
            <li class="active"><a href="{{ url('usuario/create') }}"><span class="fa fa-th-list"></span> Listado Usuarios</a></li>
          </ul>
          <!--Fin Lista desplegable de los usuarios-->

          <li><a href="{{ url('categoria/create') }}"><span class="fa fa-bookmark"></span> Categorias</a></li>
        
          <!--Lista desplegable de los productos-->
          <li data-toggle="collapse" data-target="#productos" class="collapsed"><a href="#"><span class="fa fa-folder"></span> Productos <span class="caret"></span></a></li>

          <ul class="sub-menu collapse" id="productos">
          <li><a href="{{ url('producto/create') }}"><span class="fa fa-th-list"></span> Listado Productos</a></li>
          <li><a href="{{ url('marca/create') }}"><span class="fa fa-shopping-bag"></span> Marcas</a></li>
          <li><a href="{{ url('medida/create') }}"><span class="fa fa-medium"></span> Medidas</a></li>
          <li><a href="{{ url('entrada/create') }}"><span class="fa fa-arrow-left"></span> Entradas</a></li>
          <li><a href="{{ url('salida/create') }}"><span class="fa fa-arrow-right"></span> Salidas</a></li>
          </ul>
          <!--Fin Lista desplegable de los productos-->

          <!--Lista desplegable de los clientes-->
          <li data-toggle="collapse" data-target="#clientes" class="collapsed"><a href="#"><span class="fa fa-user"></span> Clientes <span class="caret"></span></a></li>          

          <ul class="sub-menu collapse" id="clientes">
          <li><a href="{{ url('cliente/create') }}"><span class="fa fa-users"></span> Listado Clientes</a></li>
          </ul>
          <!--Fin Lista desplegable de los clientes-->

          <!--Lista desplegable de los proveedores-->
          <li data-toggle="collapse" data-target="#proveedores" class="collapsed"><a href="#"><span class="fa fa-user"></span> Proveedores <span class="caret"></span></a></li>          

          <ul class="sub-menu collapse" id="proveedores">
          <li><a href="{{ url('proveedor/create') }}"><span class="fa fa-user-circle"></span> Listado Proveedores</a></li>
          </ul>
          <!--Fin Lista desplegable de los proveedores-->
          
          <li><a href="{{ url('detalleproducto/create') }}"><span class="fa fa-list-ul"></span> Detalle Productos</a></li>
          <li><a href="{{ url('') }}"><span class="fa fa-list-alt"></span> Inventario</a></li>
          <li><a href="{{ url('') }}"><span class="fa fa-truck"></span> Camiones</a></li>
          @endif

          @if(Auth::user()->rol != 1)
          <li><a href="{{ url('departamento/create') }}"><span class="fa fa-bookmark"></span> Departamentos</a></li>

          <li><a href="{{ url('municipio/create') }}"><span class="fa fa-bookmark"></span> Municipios</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
          @endif
        </ul>
      </div>
  </div>

  <div id="main">
      <div class="col-md-12">
          <h2>Dashboards</h2>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboards</div>

                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                  @include('usuario.index')
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!
                            @yield('content')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
