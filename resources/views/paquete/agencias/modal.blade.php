<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$paque->idpaquete}}">
    {{Form::open(array('action'=>array('PaqueteController@destroy',$paque->idpaquete),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class=modal-header>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar El paquete Turistico</h4>
            </div>

            <div class="modal-body">
                <p>Confirme si desea Eliminar El paquete Turistico</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>