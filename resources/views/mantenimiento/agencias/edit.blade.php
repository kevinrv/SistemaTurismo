@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar el lugar turistico: {{$agencias->nombre}}</h3>
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
        {!!Form::model($agencias,['method'=>'PATCH','route'=>['agencias.update',$agencias->idagencias],'files'=>'true'])!!}
        {{Form::token()}}
    <div class="row">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{$agencias->nombre}}">
            </div>
        </div>
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="direccion..." value="{{$agencias->direccion}}">
            </div>
        </div>
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" rows="6" cols="40" class="form-control" placeholder="Ingresar una maximo de 100 caracteres">{{$agencias->descripcion}}</textarea>
            </div>
        </div>
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file"  name="imagen" class="form-control">
            </div>
        </div>
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Email</label>
                <input type="email"  name="email" class="form-control" placeholder="ejemplo@hotmail/gmail.com" value="{{$agencias->email}}">
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