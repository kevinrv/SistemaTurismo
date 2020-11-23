@extends ('layouts.admin')
@section ('contenido')
    <div class="row ">
        <div class="col-log-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de paquetes turisticos de la empresa <span class="text-bold">{{$agencias->nombre}}</span></h3>
        </div>
    </div>
    @include('paquete.agencias.create')
    <div class="row container">
        <div class="panel panel-primary">
            <div class="panel-body">             
                <div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Precio</th>
                            <th>Cant.Personas</th>
                            <th>Descuento</th>
                            <th>Lugar Turistico</th>
                            <th>Precio total</th>
                            <th></th>
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
                                    <a href="{{URL::action('PaqueteController@edit',$paque->idpaquete)}}"><button class="btn btn-info">Editar</button></a>
                                    <a href="" data-target="#modal-delete-{{$paque->idpaquete}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                </td>
                            </tr>
                            @include('paquete.agencias.modal')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>         
@endsection