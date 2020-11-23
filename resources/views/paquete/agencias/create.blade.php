<div class="row">
    <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Paquete</h3>
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
{!!Form::open(array('url'=>'paquete/agencias','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="row container">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-6">
                <div class="form-group">
                    <label for="nombre">Agencia</label>
                    <input type="text" name="nombre" disabled class="form-control" value="{{$agencias->nombre}}">
                    <input type="text" name="idagencias" hidden value="{{$agencias->idagencias}}">
                </div>
            </div>
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-6">
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" name="precio" class="form-control" placeholder="precio">
                </div>
            </div>
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-6">
                <div class="form-group">
                    <label for="personas">Cantidad personas</label>
                    <input type="number" id="personas" name="personas" class="form-control" placeholder="cantidad personas">
                </div>
            </div>
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-6">
                <div class="form-group">
                    <label for="descuento">Descuento</label>
                    <input type="number" id="descuento" name="descuento" class="form-control" placeholder="descuento">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group selectpicker" data-live-search="true">
                    <label for="">Lugar Turistico</label>
                    <select name="idlugar_turistico" id="" class="form-control">
                        <option value="" selected></option>
                        @foreach ($lugar as $lug)
                            <option value="{{$lug->idlugar_turistico}}">{{$lug->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-6" id="guardar">
                <div class="form-group">
                    <button class="btn btn-primary btn-block" style="margin-top: 25px" type="submit">Guardar</button>
                </div>
            </div>
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-6" id="guardar">
                    <div class="form-group">
                        <button class="btn btn-danger btn-block" style="margin-top: 25px" type="reset">Cancelar</button>
                    </div>
                </div>
        </div>
    </div>
</div>         
{!!Form::close()!!}