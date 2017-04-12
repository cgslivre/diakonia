<div id="modalRemoverEvento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <h5 class="modal-title">Remover evento</h4>
            </div>
            <div class="modal-body">
                Remover o evento {{$evento->titulo}}?
                <p class="destaque">Dia do Evento:
                    {{Date::parse($evento->data_hora_inicio)->format('j/n/Y G:i')}}</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(['route' => ['evento.destroy', $evento->id], 'method' => 'delete']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" type="submit">Remover</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
