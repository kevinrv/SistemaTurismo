@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-log-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Provincias <a href="provincia/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('provincia.search')
    </div>
</div>
<div class="row">
        <div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre Provincia</th>
                        <th>Nombre Departaamento</th>
                    </thead>
                    @foreach ($provincia as $pro)
                    <tr>
                        <td>{{$pro->idprovincia}}</td>
                        <td>{{$pro->nom_provincia}}</td>
                        <td>{{$pro->nom_departamento}}</td>
                        <td>
                            <a href="{{URL::action('ProvinciasController@edit',$pro->idprovincia)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$pro->idprovincia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('provincia.modal')
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection