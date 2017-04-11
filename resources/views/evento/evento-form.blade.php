@if( $errors->any())
    @foreach( $errors->all() as $error)
    <div class="alert alert-danger alert-dismissable alert-important">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      {{ $error }}
    </div>
    @endforeach
@endif

{{ Form::hidden('id', $evento->id) }}
<div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="titulo">
                <span class="required">*</span>Título:</label>
        </div>
        <div class="col-md-3">
            {{Form::text('titulo', null,  ['class' => 'form-control',
                'placeholder'=>'Título do Evento'])}}
        </div>
        <div class="col-md-2 text-right">
            Usar template:
        </div>
        <div class="col-md-3">
            <select id="template-evento" id="" class="form-control" placeholder="Escolher um modelo">
                <option value="" disabled selected>Escolha um modelo</option>
                <option>Encontro Geral</option>
                <option>Encontro de Jovens</option>
                <option>Retiro Geral</option>
            </select>
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="data_hora_inicio">
                <span class="required">*</span>Data e Hora Início:</label>
        </div>
        <div class="col-md-2">
            <input class="form-control" placeholder="dd/mm/YYYY HH:mm" name="data_hora_inicio"
                    type="text" id="data_hora_inicio">
            @if ($errors->has('data_hora_inicio'))
                <span class="help-block">
                    <strong>{{ $errors->first('data_hora_inicio') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-2 text-right">
            <label class="control-label" for="data_hora_fim">
                <span class="required">*</span>Data e Hora Fim:</label>
        </div>
        <div class="col-md-2">
            <input class="form-control" placeholder="dd/mm/YYYY HH:mm" name="data_hora_fim"
                    type="text" id="data_hora_fim">
            @if ($errors->has('data_hora_fim'))
                <span class="help-block">
                    <strong>{{ $errors->first('data_hora_fim') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="local_id">
                <span class="required">*</span>Local:</label>
        </div>
        <div class="col-md-3">
            <select name="local_id" id="local_id" class="select-local form-control">
                <option value="" disabled selected>Escolha um local</option>
                @foreach ($locais as $local)
                    <option value="{{$local->id}}">{{$local->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="publico_alvo_id">
                <span class="required">*</span>Público Alvo:</label>
        </div>
        <div class="col-md-3">
            <select name="publico_alvo_id" id="publico_alvo_id" class="form-control">
                <option value="" disabled selected>Selecione o público alvo</option>
                @foreach ($publicos as $publico)
                    <option value="{{$publico->id}}">{{$publico->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="tipo_evento_id">
                <span class="required">*</span>Tipo Evento:</label>
        </div>
        <div class="col-md-8">
            @foreach ($tipos as $tipo)
            <div class="radio3 radio-check radio-success radio-inline">
                {{Form::radio('tipo_evento_id', $tipo->id, false, ['id'=>'tipo-evento-'.$tipo->id])}}
                <label for="tipo-evento-{{$tipo->id}}">{{$tipo->nome}}</label>
            </div>
        @endforeach
        </div>
    </div>

    <hr/>
    <div class="text-center">
        <button class="btn btn-primary margin-r20" type="submit">
            <i class="fa fa-floppy-o" aria-hidden="true"></i> {{$btnAction}}
        </button>
        @if($edicao)
            <button class="btn btn-danger" type="button"
                    data-toggle="modal" data-target="#modalRemoverEvento">
                <i class="fa fa-trash-o" aria-hidden="true"></i> Remover Evento
            </button>
        @endif

    </div>
</div>
