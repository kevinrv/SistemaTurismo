@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar el lugar turistico: {{$lugar_turistico->nombre}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
        {!!Form::model($lugar_turistico,['method'=>'PATCH','route'=>['lugar_turistico.update',$lugar_turistico->idlugar_turistico],'files'=>'true'])!!}
        {{Form::token()}}
    <div class="row">
    <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" required value="{{$lugar_turistico->nombre}}" class="form-control" placeholder="Nombre...">
        </div>
    </div>
    <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="">provincia</label>
            <select name="provincia" id="" class="form-control">
                @foreach ($provincia as $pro)
                    @if ($pro->idprovincia==$lugar_turistico->idprovincia)
                    <option value="{{$pro->idprovincia}}" selected>{{$pro->nom_provincia}}</option>
                    @else
                    <option value="{{$pro->idprovincia}}">{{$pro->nom_provincia}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
        <textarea name="descripcion" rows="6" cols="40" class="form-control" placeholder="Ingresar una maximo de 500 caracteres">{{$lugar_turistico->descripcion}}</textarea>
        </div>
    </div>
    <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" class="form-control">
            @if (($lugar_turistico->imagen)!="")
                <img src="{{asset('imagenes/'.$lugar_turistico->imagen)}}" height="300px" widht="300px" alt="">
            @endif
        </div>
    </div>
    <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
    </div>
    </div>         
        {!!Form::close()!!}
@endsection