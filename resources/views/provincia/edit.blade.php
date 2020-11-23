@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Provincia: {{$provincia->nom_provincia}}</h3>
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
            {!!Form::model($provincia,['method'=>'PATCH','route'=>['provincia.update',$provincia->idprovincia]])!!}
            {{Form::token()}}
    <div class="row">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre Provincia</label>
                <input type="text" name="nombre_provincia"value="{{$provincia->nom_provincia}}" class="form-control">
            </div>
        </div>
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="">Departamento</label>
                <select name="departamento" id="" class="form-control">
                    @foreach ($departamento as $dep)
                        @if ($dep->iddepartamento==$provincia->iddepartamento)
                        <option value="{{$dep->iddepartamento}}" selected>{{$dep->nom_departamento}}</option>
                        @else
                        <option value="{{$dep->iddepartamento}}">{{$dep->nom_departamento}}</option>
                        @endif
                    @endforeach
                </select>
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