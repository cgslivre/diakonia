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

    <div class="row form-group">
        <div class="col-md-2 text-right">
            <label for="nome" class="control-label">
                <span class="required">*</span>Título:</label>
        </div>
        <div class="col-md-9">
            {{Form::text('titulo', null,  ['class' => 'form-control',
                'placeholder'=>'Título da consulta'])}}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-2 text-right">
        <label for="nome" class="control-label">
            <span class="required">*</span>Identificador:</label>
        </div>

        <div class="col-md-9">
            {{Form::text('slug', null,  ['class' => 'form-control',
                'placeholder'=>'Identificador da consulta'])}}
        </div>
    </div>
    {{Form::submit('Atualizar consulta', ['class' => 'btn btn-primary'])}}
</div>
