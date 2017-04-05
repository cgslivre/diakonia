@if( $errors->any())
    @foreach( $errors->all() as $error)
    <div class="alert alert-danger alert-dismissable alert-important">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      {{ $error }}
    </div>
    @endforeach

@endif
{{ Form::hidden('id', $consulta->id) }}
<div class="edicao-consulta">

    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label for="nome" class="control-label">
                <span class="required">*</span>Título:</label>
        </div>
        <div class="col-md-9">
            {{Form::text('titulo', null,  ['class' => 'form-control',
                'placeholder'=>'Título da consulta'])}}
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
        <label for="nome" class="control-label">
            <span class="required">*</span>Identificador:</label>
        </div>

        <div class="col-md-9">
            {{Form::text('slug', null,  ['class' => 'form-control',
                'placeholder'=>'Identificador da consulta'])}}
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <label for="idade_minima" class="col-md-offset-1">Idade Mínima:</label>
        {{Form::number('idade_minima', $consulta->idade_minima,
            ['max'=>'99','class'=>'width-05 input-bs'])}}
        <label for="idade_maxima" class="">Idade Máxima:</label>
        {{Form::number('idade_maxima', $consulta->idade_maxima,
            ['max'=>'99','class'=>'width-05 input-bs'])}}
        <label for="sexo1" class="col-md-offset-1">Sexo:</label>
        <div class="radio3 radio-check radio-success radio-inline no-margin-sides">
            {{Form::radio('sexo', '', $consulta->sexo?false:true, ['id'=>'sexo-ambos'])}}
            <label for="sexo-ambos">Ambos</label>
        </div>
        <div class="radio3 radio-check radio-success radio-inline no-margin-sides">
            {{Form::radio('sexo', 'M', $consulta->sexo=='M'?true:false,['id'=>'sexo-masculino'])}}
            <label for="sexo-masculino">Masculino</label>
        </div>
        <div class="radio3 radio-check radio-success radio-inline no-margin-sides">
            {{Form::radio('sexo', 'F', $consulta->sexo=='F'?true:false, ['id'=>'sexo-feminino'])}}
            <label for="sexo-feminino">Feminino</label>
        </div>
    </div>

    <div class="row form-group no-margin-sides">
        <label for="tem_discipulos" class="col-md-offset-1">Tem discipulo(s)?</label>
        <div class="radio3 radio-check radio-success radio-inline no-margin-sides">
            {{Form::radio('tem_discipulos', '', $consulta->tem_discipulos?false:true, ['id'=>'discipulador-na'])}}
            <label for="discipulador-na">Não se aplica</label>
        </div>
        <div class="radio3 radio-check radio-success radio-inline no-margin-sides">
            {{Form::radio('tem_discipulos', 'S', $consulta->tem_discipulos=='S'?true:false,['id'=>'discipulador-sim'])}}
            <label for="discipulador-sim">Sim</label>
        </div>
        <div class="radio3 radio-check radio-success radio-inline no-margin-sides">
            {{Form::radio('tem_discipulos', 'N', $consulta->tem_discipulos=='N'?true:false, ['id'=>'discipulador-nao'])}}
            <label for="discipulador-nao">Não</label>
        </div>

        <label for="tem_discipulador" class="col-md-offset-1">Tem discipulador(a)?</label>
        <div class="radio3 radio-check radio-success radio-inline no-margin-sides">
            {{Form::radio('tem_discipulador', '', $consulta->tem_discipulador?false:true, ['id'=>'tem-discipulador-na'])}}
            <label for="tem-discipulador-na">Não se aplica</label>
        </div>
        <div class="radio3 radio-check radio-success radio-inline no-margin-sides">
            {{Form::radio('tem_discipulador', 'S', $consulta->tem_discipulador=='S'?true:false,['id'=>'tem-discipulador-sim'])}}
            <label for="tem-discipulador-sim">Sim</label>
        </div>
        <div class="radio3 radio-check radio-success radio-inline no-margin-sides">
            {{Form::radio('tem_discipulador', 'N', $consulta->tem_discipulador=='N'?true:false, ['id'=>'tem-discipulador-nao'])}}
            <label for="tem-discipulador-nao">Não</label>
        </div>
    </div>

    <div class="row form-group no-margin-sides">
        <div class="col-md-1 col-md-offset-1 text-right">

            <label for="regiao" class="">Regiões: </label>
        </div>
        <div class="col-md-5">
            <select name="regioes[]" id="regioes[]" class="select-regioes"
                multiple="multiple" style="width:100%">
                @foreach ($regioes as $regiao)
                    <option value="{{$regiao}}">{{$regiao}}</option>
                @endforeach

            </select>
        </div>
        <div class="col-md-1 text-right">
            <label for="regiao" class="">Grupos: </label>
        </div>
        <div class="col-md-4">
            <select name="grupos[]" id="grupos[]" class="select-grupos"
            multiple="multiple" style="width:100%">
            @foreach ($grupos as $grupo)
                <option value="{{$grupo->id}}">{{$grupo->nome}}</option>
            @endforeach
        </select>
    </div>
    </div>
    {{Form::submit('Atualizar consulta', ['class' => 'btn btn-primary'])}}
</div>
