@extends ('layouts.plantilla')
@section('contenidos')
<section class="page-link bg-dark text-dark">
  <div class="container text-center">
    @foreach ($lugar_turistico as $item)
    <h2 class="mb-4 text-white ">{{$item->nombre}}</h2>
    <p class="mb-4 text-white ">{{$item->descripcion}}</p>
    <p class="mb-4 text-white ">PROVINCIA: {{$item->nom_provincia}}</p>
    <p class="mb-4 text-white ">DEPARTAMENTO: {{$item->nom_departamento}}</p>
    <img src="/imagenes/{{$item->imagen}}" alt="" width="auto" height="250px">
    @endforeach
  </div>
</section>
<p></p>
<section class="page-header" style="padding-left: 50px;padding-right: 25px">
  @foreach ($paquete as $paque)
  <div class="row">
    <div class="card col-sm-10 bg-primary">
      <h5 class="card-header">{{$paque->nombre}}</h5>
      <div class="card-body">
        <p class="card-text">{{$paque->descripcion}}</p>
        <p class="card-text">DIRECCION: {{$paque->direccion}}</p>
        <p>E-MAIL: {{$paque->email}}</p>
        <ul class="badge-warning rounded">
          <li>PRECIO: {{$paque->precio}} soles</li>
          <li>NUMERO DE PERSONAS: {{$paque->num_persona}}</li>
          <li>DESCUENTO: {{$paque->descuento}} soles</li>
          <li>COSTO TOTAL: {{$paque->total}} soles</li>
        </ul>
      </div>
    </div>
    <div class="col-sm-1">
      <img class="rounded" src="/imagenes/{{$paque->imagen}}" alt="{{$paque->nombre}}" width="210px" height="300px">
    </div>
  </div>

  <p></p>
  @endforeach
</section>

@endsection