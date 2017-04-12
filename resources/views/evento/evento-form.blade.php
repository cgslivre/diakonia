{{ Date::setLocale('pt_BR') }}
{{ Form::hidden('id', $evento->id) }}
<div>
    <div class="row form-group no-margin-sides">
        <div class="{{ $errors->has('titulo') ? ' has-error' : '' }}">
            <div class="col-md-2 text-right">
                <label class="control-label required" for="titulo">
                    Título:</label>
            </div>
            <div class="col-md-3">
                {{Form::text('titulo', null,  ['class' => 'form-control',
                    'placeholder'=>'Título do Evento'])}}
                    @if ($errors->has('titulo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('titulo') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        @if(!$edicao)
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
        @endif
    </div>
    <div class="row form-group no-margin-sides">
        <div class="{{ $errors->has('data_hora_inicio') ? ' has-error' : '' }}">
            <div class="col-md-2 text-right">
                <label class="control-label required" for="data_hora_inicio">
                    Data e Hora Início:</label>
            </div>
            <div class="col-md-2">
                @if($edicao)
                    <input class="form-control" placeholder="dd/mm/YYYY HH:mm" name="data_hora_inicio"
                    type="text" id="data_hora_inicio"
                    value="{{Date::parse($evento->data_hora_inicio)->format('j/n/Y G:i')}}">
                @else
                    <input class="form-control" placeholder="dd/mm/YYYY HH:mm" name="data_hora_inicio"
                    type="text" id="data_hora_inicio"
                    value="{{old('data_hora_inicio') ?
                        Date::parse(old('data_hora_inicio'))->format('j/n/Y G:i') : ''}}">
                @endif
                @if ($errors->has('data_hora_inicio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('data_hora_inicio') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="{{ $errors->has('data_hora_fim') ? ' has-error' : '' }}">
            <div class="col-md-2 text-right">
                <label class="control-label required" for="data_hora_fim">
                    Data e Hora Fim:</label>
            </div>
            <div class="col-md-2 {{ $errors->has('email') ? ' has-error' : '' }}">
                @if($edicao)
                    <input class="form-control" placeholder="dd/mm/YYYY HH:mm" name="data_hora_fim"
                    type="text" id="data_hora_fim"
                    value="{{Date::parse($evento->data_hora_fim)->format('j/n/Y G:i')}}">
                @else
                    <input class="form-control" placeholder="dd/mm/YYYY HH:mm" name="data_hora_fim"
                    type="text" id="data_hora_fim"
                    value="{{old('data_hora_fim') ?
                        Date::parse(old('data_hora_fim'))->format('j/n/Y G:i') : ''}}">
                @endif

                @if ($errors->has('data_hora_fim'))
                    <span class="help-block">
                        <strong>{{ $errors->first('data_hora_fim') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row form-group no-margin-sides {{ $errors->has('local_id') ? ' has-error' : '' }}">
        <div class="col-md-2 text-right">
            <label class="control-label required" for="local_id"> Local:</label>
        </div>
        <div class="col-md-3">
            <select name="local_id" id="local_id" class="select-local form-control">
                <option value="" disabled selected>Escolha um local</option>
                @foreach ($locais as $local)
                    <option value="{{$local->id}}"
                        {{old('local_id') == $local->id ? 'selected' : ''}}>
                        {{$local->nome}}</option>
                @endforeach
            </select>
            @if ($errors->has('local_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('local_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row form-group no-margin-sides{{ $errors->has('publico_alvo_id') ? ' has-error' : '' }}">
        <div class="col-md-2 text-right">
            <label class="control-label required" for="publico_alvo_id">
                Público Alvo:</label>
        </div>
        <div class="col-md-3">
            <select name="publico_alvo_id" id="publico_alvo_id" class="form-control">
                <option value="" disabled selected>Selecione o público alvo</option>
                @foreach ($publicos as $publico)
                    <option value="{{$publico->id}}"
                        {{old('publico_alvo_id') == $publico->id ? 'selected' : ''}}>
                        {{$publico->nome}}</option>
                @endforeach
            </select>
            @if ($errors->has('publico_alvo_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('publico_alvo_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row form-group no-margin-sides{{ $errors->has('tipo_evento_id') ? ' has-error' : '' }}">
        <div class="col-md-2 text-right">
            <label class="control-label required" for="tipo_evento_id">
                Tipo Evento:</label>
        </div>
        <div class="col-md-8">
            @foreach ($tipos as $tipo)
            <div class="radio3 radio-check radio-success radio-inline">
                {{Form::radio('tipo_evento_id', $tipo->id,
                    old('tipo_evento_id') == $tipo->id ? true : false,
                    ['id'=>'tipo-evento-'.$tipo->id])}}
                <label for="tipo-evento-{{$tipo->id}}">{{$tipo->nome}}</label>
            </div>
            @endforeach
            @if ($errors->has('tipo_evento_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('tipo_evento_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="descricao">Descrição:</label>
        </div>
        <div class="col-md-8">
            {{Form::textarea('descricao', $tipo->descricao, [
                'class'=>'form-control',
                'rows'=>3 ,
                'placeholder'=>'Insira uma descrição do evento (opcional)'])}}
        </div>
    </div>

    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="programacao">Programação:</label>
        </div>
        <div class="col-md-8">
            {{Form::textarea('programacao', $tipo->programacao, [
                'class'=>'form-control',
                'rows'=>5 ,
                'placeholder'=>'Detalhes da programação (opcional)'])}}
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
