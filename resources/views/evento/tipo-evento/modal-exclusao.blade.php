<div id="modalRemoverLocal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <h5 class="modal-title">Remover local</h4>
            </div>
            <div class="modal-body">
                <p>Confirma a exclusão do local <strong>{{ $local->nome }}</strong>?</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(['route' => ['local.destroy', $local->id], 'method' => 'delete']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" type="submit">Remover</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
