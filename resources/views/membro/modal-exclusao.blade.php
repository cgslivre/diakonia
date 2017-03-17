<div id="modalRemoverMembro" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <h5 class="modal-title">Remover membro</h4>
            </div>
            <div class="modal-body">
                <p>Confirma a exclusão de <strong>{{ $membro->nome }}</strong>?</p>
                <p><strong>Aviso:</strong></p>
                <p>Todos os relacionamentos relacionados também serão removidos.</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(['route' => ['membro.destroy', $membro->id], 'method' => 'delete']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" type="submit">Remover</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
