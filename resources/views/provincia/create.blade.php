@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Artículo</h3>
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
            {!!Form::open(array('url'=>'provincia','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Provincia</label>
                <input type="text" name="nombre_provincia" class="form-control" placeholder="Nombre...">
            </div>
        </div>
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="">Departamento</label>
                <select name="departamento" id="" class="form-control" sl>
                    <option value="" selected></option>
                    @foreach ($departamento as $dep)
                        <option value="{{$dep->iddepartamento}}">{{$dep->nom_departamento}}</option>
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