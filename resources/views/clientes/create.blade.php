<div class="modal fade" id="ventana">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- HEADER DE LA VENTANA-->
                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <!-- CONTENIDO DE LA VENTANA-->
            <div class="modal-body">
                {{Form::open(array('action'=>array('AdministracionController@store'),'method'=>'POST'))}}
                <div class="row container">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" id="precio" name="precio" class="form-control" placeholder="precio">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="personas">Cantidad personas</label>
                            <input type="number" id="personas" name="personas" class="form-control"
                                placeholder="cantidad personas">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descuento">Descuento</label>
                            <input type="number" id="descuento" name="descuento" class="form-control"
                                placeholder="descuento">
                        </div>
                    </div>
                    <div class="col-md-12">
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
                    <input type="text" id="idagencias" name="idagencias" value="{{$agencias->idagencias}}" hidden>
                    <div id="guardar" class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" style="margin-top: 25px"
                                type="submit">Guardar</button>
                        </div>
                    </div>
                    <div id="guardar" class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-danger btn-block" style="margin-top: 25px"
                                type="reset">Cancelar</button>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>