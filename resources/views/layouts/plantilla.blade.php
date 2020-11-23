<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Guia Turistica UNASAM</title>
  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic'
    rel='stylesheet' type='text/css'>
  <!-- Plugin CSS -->
  <link href={{ asset('vendor/magnific-popup/magnific-popup.css') }} rel="stylesheet">
  <!-- Theme CSS - Includes Bootstrap -->
  <link href={{ asset('css/creative.min.css') }} rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-info" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">UNASAM TRAVEL</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
          data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/">INICIO</a>
            </li>
  
            @if (Auth::check())
            <li class="dropdown text-danger">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">{{$agencias->nombre}}</span>
              </a>
              <ul class="dropdown-menu bg-primary">
                <li class="user-footer">
                  <a class="btn btn-default btn-flat"
                    href="{{URL::action('AdministracionController@show',auth()->user()->idusuario)}}">Panel de
                    Control</a>
                </li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Cerrar Session</a>
                  </div>
                </li>
              </ul>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="#plan">CONTRATAR PLANES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login">INICIO DE SESSION</a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100 w-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">GUIA TURISTICA UNASAM</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Encuentra tus mejores para paquetes para realizar el viaje de
            tus sueños con nuestras mejores empresas y sus ofertas en paquetes de viajes</p>
        </div>
      </div>
    </div>
  </header>
  @yield('contenidos')
  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Yuri@martin</div>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

</body>

</html>