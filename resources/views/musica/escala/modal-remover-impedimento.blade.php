<div id="modalRemoverImpedimento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <h5 class="modal-title">Remover impedimento na escala?</h4>
            </div>
            <div class="modal-body">
                <strong>{{$colaborador->user->name}}</strong>, você havia registrado um impedimento
                para particar da escala no dia {{Date::parse($evento->data_hora_inicio)->format('j/M/Y')}}.
                <p>Deseja informar ao líder que está disponível?</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(['route' => ['musica.escala.impedimento.destroy', $evento->escalaMusica->id],
                     'method' => 'post']) }}
                     {{ Form::hidden('colaborador_id', $colaborador->id) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" type="submit">Sim, estou disponível</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
