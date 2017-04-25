<div id="modalRemoverEnsino" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <h5 class="modal-title">Remover ensino</h4>
            </div>
            <div class="modal-body">
                Remover o ensino <strong>{{$ensino->titulo}}</strong>?
            </div>
            <div class="modal-footer">
                {{ Form::open(['route' => ['material.ensino.destroy', $ensino->id],
                     'method' => 'delete']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" type="submit">Remover</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
