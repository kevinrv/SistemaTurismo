@extends ('layouts.plantilla')
@section('contenidos')
<!-- Call to Action Section -->
<section class="page-header bg-dark text-dark">
    <div class="container text-center">
        <p></p>
        <h2 class="mb-4 text-white ">LUGARES TURISTICOS</h2>
        @include('layouts.lugares.search')
    </div>
    <p></p>
    @foreach ($lugar_turistico as $item)
    <div class="row" style="padding-left: 80px">
        <div class="card col-sm-9">
            <h5 class="card-header">{{$item->nombre}}</h5>
            <div class="card-body">
                <p class="card-text">{{$item->descripcion}}</p>
                <p>PROVINCIA: {{$item->nom_provincia}}</p>
                <input type="hidden" value="{{$item->idlugar_turistico}}">
                <p>DEPARTAMENTO: {{$item->nom_departamento}}</p>
                <a href="lugares/agencias/{{$item->idlugar_turistico}}" class="btn btn-info">VER AGENCIAS</a>
                <a href="" class="btn btn-info">VER HOTELES</a>
            </div>
        </div>
        <div class=" col-sm-2">
            <img class="rounded" src="/imagenes/{{$item->imagen}}" alt="" width="250px" height="300px">
        </div>
    </div>
    <p></p>
    @endforeach
    <p>FIN DE LA PAGINA</p>
</section>
@endsection