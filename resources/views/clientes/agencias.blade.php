<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Guia Turistica UNASAM</title>
    <!-- Font Awesome Icons -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
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
                                    href="{{URL::action('AdministracionController@show',auth()->user()->idusuario)}}">Panel
                                    de
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
    <p>----</p>
    <p>----</p>
    <hr>
    <div class="row text-center">
        <div class="col-md-12">
            <h1>PANEL DE ADMINISTRACION DE PAQUETES TURISTICOS</h1>
            <h1 class="text-uppercase text-primary text-bold">{{$agencias->nombre}}</h1>
            <div class="container">
                <a href="#ventana" class="btn btn-primary btn-block" data-toggle="modal">NUEVO PAQUETE</a>
            </div>
        </div>
    </div>
    <p></p>
    <div>
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-md-10 container">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Precio</th>
                            <th>Cant.Personas</th>
                            <th>Descuento</th>
                            <th>Lugar Turistico</th>
                            <th>Precio total</th>
                            <th>Opciones</th>
                        </thead>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                        <tbody>
                            @foreach ($paquete as $paque)
                            <tr>
                                <td>{{$paque->precio}}</td>
                                <td>{{$paque->num_persona}}</td>
                                <td>{{$paque->descuento}}</td>
                                <td>{{$paque->nombre}}</td>
                                <td>{{$paque->total}}</td>
                                <td class="text-center" style="width: 15%">
                                    <a href="{{URL::action('PaqueteController@edit',$paque->idpaquete)}}"><button
                                            class="btn btn-info">Editar</button></a>
                                    <a href="" data-target="#modal-delete-{{$paque->idpaquete}}"
                                        data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                </td>
                            </tr>
                            @endforeach
                            @include('clientes.create')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

</body>

</html>