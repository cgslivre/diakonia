{{ Form::hidden('id', $ensino->id) }}
@if( $errors->any())
    @foreach( $errors->all() as $error)
    <div class="alert alert-danger alert-dismissable alert-important">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      {{ $error }}
    </div>
    @endforeach
@endif

<div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label" for="arquivo">
                <span class="required">*</span>Arquivo:</label>
        </div>
        <div class="col-md-9">
            {{ Form::file('arquivo',['id'=>'arquivo']) }}
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label for="titulo" class="control-label">
                <span class="required">*</span>Título:</label>
        </div>
        <div class="col-md-9">
            {{Form::text('titulo', null,  ['class' => 'form-control titulo',
                'placeholder'=>'Título do Ensino'])}}
        </div>
    </div>
    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
        <label for="slug" class="control-label">
            <span class="required">*</span>Identificador:</label>
        </div>

        <div class="col-md-9">
            {{Form::text('slug', null,  ['class' => 'form-control slug',
                'placeholder'=>'Identificador do arquivo'])}}
        </div>
    </div>

    <div class="row form-group no-margin-sides">
        <div class="col-md-2 text-right">
            <label class="control-label required" for="categoria_ensino_id"> Categoria Ensino:</label>
        </div>
        <div class="col-md-3">
            <select name="categoria_ensino_id" id="categoria_ensino_id"
                class="select-categoria-ensino form-control">
                @if($edicao)
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}"
                            {{$ensino->categoria_ensino_id == $categoria->id ? 'selected' : ''}}>
                            {{$categoria->nome}}</option>
                    @endforeach
                @else
                    <option value="" disabled selected>Escolha uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}"
                            {{old('categoria_ensino_id') == $categoria->id ? 'selected' : ''}}>
                            {{$categoria->nome}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-primary margin-r20" type="submit">
            {{$submitButton}}
        </button>
        @if($edicao)
            <button class="btn btn-danger" type="button"
                    data-toggle="modal" data-target="#modalRemoverEnsino">
                <i class="fa fa-trash-o" aria-hidden="true"></i> Remover Ensino
            </button>
        @endif

    </div>

</div>

@section('scripts')
    <script>
    $('input.titulo').on('input',function(){
        $('input.slug').val(slug($('input.titulo').val(),{lower: true}));
    });
    </script>
@endsection
