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
        <div class="col-md-1 text-right">
            <label class="control-label" for="nome">
                <span class="required">*</span>Título:</label>
        </div>
        <div class="col-md-4">
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
