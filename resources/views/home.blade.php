@extends('index.login')

@section('content')

<div class="row-offcanvas row-offcanvas-left">
  <div id="sidebar" class="sidebar-offcanvas">
      <div class="col-md-12">
        <h3>Menu Principal</h3>
        <ul class="nav nav-pills nav-stacked">
          <li><a href="{{ url('index') }}"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
          <li><a href="{{ url('')}}"><span class="glyphicon glyphicon-folder-open"></span> Productos</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
          <li><a href="#">Section</a></li>
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
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
