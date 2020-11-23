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
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet" -->
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
    <div class="container h-100">
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
  <!-- Lugares Turisticos -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h1>DESTINOS TURISTICOS</h1>
      <hr class="divider my-4">
      <div class="row">
        <div class="mdb-lightbox">
          <div class="col-md-12">
            <img class="col-md-3 img-fluid" src="/imagenes/1.jpg" alt="">
            <img class="col-md-3 img-fluid" src="/imagenes/2.jpeg" alt="">
            <img class="col-md-3 img-fluid" src="/imagenes/3.jpg" alt="">
            <img class="col-md-3 img-fluid" src="/imagenes/4.jpg" alt="">
            <img class="col-md-3 img-fluid" src="/imagenes/a1.jpg" alt="">
            <img class="col-md-3 img-fluid" src="/imagenes/a2.jpg" alt="">
          </div>
        </div>
      </div>
      <p></p>
      <a href="/lugares" class="btn btn-primary btn-lg btn-block">VER TODOS LOS LUGARES TURISTICOS </a>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section">
    <div class="container">
      <h2 class="text-center mt-0">Nuestros Servicios</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-6 col-md-6 text-center badge-light">
          <div class="mt-5">
            <i class="fas fa-4x fa-shuttle-van text-primary mb-4"></i>
            <h3 class="h4 mb-2">Agencias de Viajes</h3>
            <p class="text-muted mb-0">Encuentra los mejores paquetes en las mejores agencias de viajes</p>
            <p></p>
            <a href="agencias" class="btn btn-primary">TODOS LOS PAQUETES</a>
            <p></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 text-center badge-light">
          <div class="mt-5">
            <i class="fas fa-4x fa-hotel text-primary mb-4"></i>
            <h3 class="h4 mb-2">Hoteles</h3>
            <p class="text-muted mb-0">Encuentra los mejores paquetes en los mejores Hoteles</p>
            <p></p>
            <a href="" class="btn btn-primary">TODOS LOS PAQUETES</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="page-section bg-dark" id="plan">
    <div class="container text-center">
      <h2 class="mb-4 text-white">Publica tu empresa de agencias de viajes o hoteles para dar a conocer tus paquetes
      </h2>
      <hr class="divider my-4">
      <h2 class="mb-4 text-white text-bold text-warning">ELIJA UN PLAN</h2>
      <div class="card-deck">
        @foreach ($pagos as $pago)
        <div class="card bg-light">
          <div class="card-header text-center">Plan {{$pago->Tipo}}</div>
          <div class="card-body text-center">
            @if (($pago->Tipo)=='Prueba')
            <p class="card-text alert-danger rounded">Plan de prueba solo por 15 dias</p>
            @else
            <p>-</p>
            @endif
            <hr>
            <p class="card-text">Precio: S/. {{$pago->costo}}</p>
            <hr>
            <p class="card-text">Soporte Telefonico</p>
            <hr>
            <p class="card-text">Soporte Tecnico</p>
            <hr>
            <p class="card-text">Acceso Total a sus Paquetes</p>
            <hr>
            <a class="nav-link" href="/paypal"><button type="submit"
                class="btn btn-danger btn-block">Obtener Plan</button></a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">CONTACTANOS AHORA Y COMIENZA A HACER CRECER TU EMPRESA</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Aprovecha nuestros paquetes para suscribirte y comenzar a publicar tu negocio</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>936695173</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">yuri_1030@hotmail.com</a>
        </div>
      </div>
    </div>
  </section>

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