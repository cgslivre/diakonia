@if( $errors->any())
    @foreach( $errors->all() as $error)
    <div class="alert alert-danger alert-dismissable alert-important">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      {{ $error }}
    </div>
    @endforeach
@endif

{{ Form::hidden('id', $local->id) }}
<div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="nome">
                <span class="required">*</span>Nome:</label>
        </div>
        <div class="col-md-9">
            {{Form::text('nome', null,  ['class' => 'form-control',
                'placeholder'=>'Nome do local'])}}
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="slug">
                <span class="required">*</span>Identificador:</label>
        </div>
        <div class="col-md-9">
            {{Form::text('slug', null,  ['class' => 'form-control',
                'placeholder'=>'Identificador'])}}
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="endereco">Endereço:</label>
        </div>
        <div class="col-md-9">
            {{Form::text('endereco', null,  ['class' => 'form-control',
                'placeholder'=>'Endereço'])}}
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="cidade">Cidade:</label>
        </div>
        <div class="col-md-3">
            {{Form::text('cidade', null,  ['class' => 'form-control',
                'placeholder'=>'Cidade'])}}
        </div>
        <div class="col-md-1 text-right">
            <label class="control-label" for="uf">UF:</label>
        </div>
        <div class="col-md-1">
            {{Form::text('uf', null,  ['class' => 'form-control',
                'placeholder'=>'UF'])}}
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="latitude">Latitude:</label>
        </div>
        <div class="col-md-2">
            @if( $local->localizacao )
            <input class="form-control" placeholder="Latitude" name="latitude"
                type="text" value="{{$local->localizacaoJson->latitude}}">
            @else
                <input class="form-control" placeholder="Latitude" name="latitude"
                    type="text" value="">
            @endif
        </div>
        <div class="col-md-1 text-right">
            <label class="control-label" for="uf">Longitude:</label>
        </div>
        <div class="col-md-2">
            @if( $local->localizacao )
            <input class="form-control" placeholder="Longitude" name="longitude"
                type="text" value="{{$local->localizacaoJson->longitude}}">
            @else
                <input class="form-control" placeholder="Longitude" name="longitude"
                type="text" value="">
            @endif

        </div>
    </div>
    <hr/>
    <div class="text-center">
        <button class="btn btn-primary margin-r20" type="submit">
            <i class="fa fa-floppy-o" aria-hidden="true"></i> {{$btnAction}}
        </button>
        @if($edicao)
            <button class="btn btn-danger" type="button"
                    data-toggle="modal" data-target="#modalRemoverLocal">
                <i class="fa fa-trash-o" aria-hidden="true"></i> Remover Local
            </button>
        @endif

    </div>
</div>
