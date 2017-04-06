<div id="modalRemoverConsultaMembro" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <h5 class="modal-title">Remover consulta</h4>
            </div>
            <div class="modal-body">
                <p>Confirma a exclusão da consulta <strong>{{ $consulta->titulo }}</strong>?</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(['route' => ['consulta.destroy', $consulta->id], 'method' => 'delete']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" type="submit">Remover</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
