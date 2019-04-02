
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Sticky Footer Navbar Template · Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{URL::asset('bootstrap/estilos/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('icons/styleIcon.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .container {
        margin-top: 5%;
        max-width: 1600px;
      }
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top" role="navigation">
    <a class="navbar-brand" href="{{route('unidad_index')}}"><img src={{asset('imagenes/logo.png') }} class="id_img_fondo" /></a>

    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('unidad_index')}}"><span class="iconCasa"></span><span>Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('unidad_detalle',['id' => 0])}}"><span class="iconUnidad"></span><span>Unidades</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" ><span class="iconDireccion"></span><span>Direccion</span></a>
        </li>
      </ul>
      <div class="dropdown show" style="margin-right: 5%;">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{$valor->user_email}}
          </a>   
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="{{ action('Accesos\AccesoController@cerrar_sesion', $valor->user_email ) }}">
              <span class="glyphicon glyphicon-trash">Cerrar Sesion</span></a>
            </div>
        </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main role="main" class="container">

    @yield('content')
      
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>
<script type="text/javascript" src="{{ URL::asset('bootstrap/js/jquery-3.3.1.slim.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bootstrap/js/popper.min.js') }}"></script>
</body>
</html>
