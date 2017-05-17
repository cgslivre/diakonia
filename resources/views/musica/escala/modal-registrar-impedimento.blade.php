<div id="modalRegistrarImpedimento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <h5 class="modal-title">Registrar impedimento na escala?</h4>
            </div>
            <div class="modal-body">
                <strong>{{$colaborador->user->name}}</strong>, confirma o impedimento para participar
                da escala no dia {{Date::parse($evento->data_hora_inicio)->format('j/M/Y')}}
            </div>
            <div class="modal-footer">
                {{ Form::open(['route' => ['musica.escala.impedimento.create', $evento->escalaMusica->id],
                     'method' => 'post']) }}
                     {{ Form::hidden('colaborador_id', $colaborador->id) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" type="submit">Confirmo</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
