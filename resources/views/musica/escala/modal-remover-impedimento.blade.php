<div id="modalRemoverImpedimento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <h5 class="modal-title">Remover impedimento na escala?</h4>
            </div>
            <div class="modal-body">
                Você havia registrado um impedimento para particar da escala no dia
                <span id="c_imp_dt_evento"></span>.
                <p>Deseja informar ao líder que está disponível?</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(['id'=>'frmRemoverImpedimento','method' => 'post']) }}
                     <input name="imp_colaborador_id_rem" id="imp_colaborador_id_rem" type="hidden">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" type="submit">Sim, estou disponível</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
