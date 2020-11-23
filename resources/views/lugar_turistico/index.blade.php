@extends ('layouts.admin')
@section ('contenido')
<div class="row container">
    <div class="col-log-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de lugares turisticos <a href="lugar_turistico/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('lugar_turistico.search')
    </div>
</div>
<div class="row">
        <div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Lugares turisticos</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Nombre Provincias</th>
                        <th>Nombre Departamento</th>
                    </thead>
                    @foreach ($lugar_turistico as $lugar)
                    <tr>
                        <td>{{$lugar->idlugar_turistico}}</td>
                        <td>{{$lugar->nombre}}</td>
                        <td style="width: 30%">{{$lugar->descripcion}}</td>
                        <td>
                            <img src="{{asset('imagenes/'.$lugar->imagen)}}" alt="{{$lugar->nombre}}" height="100px" width="100px" class="img-thumbnail">
                        </td>
                        <td>{{$lugar->nom_provincia}}</td>
                        <td>{{$lugar->nom_departamento}}</td>
                        <td>
                            <a href="{{URL::action('Lugar_TuristicoController@edit',$lugar->idlugar_turistico)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$lugar->idlugar_turistico}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('lugar_turistico.modal')
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection