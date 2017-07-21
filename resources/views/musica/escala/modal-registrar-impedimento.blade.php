<div id="modalRegistrarImpedimento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <h5 class="modal-title">Registrar impedimento na escala?</h4>
            </div>
            <div class="modal-body">
                Confirma o impedimento para participar
                da escala no dia <span id="c_imp_dt_evento"></span>?
            </div>
            <div class="modal-footer">
                {{ Form::open(['method' => 'post','id'=>'frmCriarImpedimento']) }}
                     <input name="imp_colaborador_id" id="imp_colaborador_id" type="hidden">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" type="submit">Confirmo</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
