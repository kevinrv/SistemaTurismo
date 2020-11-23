@extends ('layouts.admin')
@section ('contenido')
<div class="row container">
    <div class="col-log-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de lugares turisticos</h3>
        @include('paquete.agencias.search')
    </div>
</div>
<div class="row">
        <div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DIRECCION</th>
                        <th>DESCRIPCION</th>
                        <th>IMAGEN</th>
                        <th>EMAIL</th>
                        <th></th>
                    </thead>
                    @foreach ($agencias as $age)
                    <tr>
                        <td>{{$age->idagencias}}</td>
                        <td>{{$age->nombre}}</td>
                        <td>{{$age->direccion}}</td>
                        <td>{{$age->descripcion}}</td>
                        <td>
                            <img src="{{asset('imagenes/'.$age->imagen)}}"height="100px" width="100px" class="img-thumbnail">
                        </td>
                        <td>{{$age->email}}</td>
                        <td style="width: 10%">
                            <a href="{{URL::action('PaqueteController@show',$age->idagencias)}}"><button class="btn btn-primary">Paquetes Turistico</button></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection