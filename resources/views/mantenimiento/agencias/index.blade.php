@extends ('layouts.admin')
@section ('contenido')
<div class="row container">
    <div class="col-log-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de lugares turisticos <a href="agencias/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('mantenimiento.agencias.search')
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
                        <td>
                            <a href="{{URL::action('AgenciasController@edit',$age->idagencias)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$age->idagencias}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('mantenimiento.agencias.modal')
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection