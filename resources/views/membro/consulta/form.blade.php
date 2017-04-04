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
    <div class="row">
        <label for="idade_minima" class="col-md-offset-1">Idade Mínima:</label>
        {{Form::number('idade_minima', $consulta->idade_minima, ['max'=>'99','class'=>'width-05'])}}
        <label for="idade_maxima" class="">Idade Máxima:</label>
        {{Form::number('idade_maxima', $consulta->idade_maxima, ['max'=>'99','class'=>'width-05'])}}
        <label for="sexo1" class="">Sexo:</label>
        <div class="radio3 radio-check radio-success radio-inline">
            {{Form::radio('sexo', '', $consulta->sexo?false:true, ['id'=>'sexo-ambos'])}}
            <label for="sexo-ambos">Ambos</label>
        </div>
        <div class="radio3 radio-check radio-success radio-inline">
            {{Form::radio('sexo', 'M', $consulta->sexo=='M'?true:false,['id'=>'sexo-masculino'])}}
            <label for="sexo-masculino">Masculino</label>
        </div>
        <div class="radio3 radio-check radio-success radio-inline">
            {{Form::radio('sexo', 'F', $consulta->sexo=='F'?true:false, ['id'=>'sexo-feminino'])}}
            <label for="sexo-feminino">Feminino</label>
        </div>

    </div>
    {{Form::submit('Atualizar consulta', ['class' => 'btn btn-primary'])}}
</div>
