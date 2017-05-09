@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.colaborador.index')}}">
    Equipe de Música</a></li>
@stop

@section('nivel3')<li class="active">Novo membro da equipe de música</li>@stop


@section('content')

    <div class="container-fluid">
        {{ Form::open(array('route' => 'musica.colaborador.store', 'class'=> 'form-horizontal',
            'name'=>'colaboradorMusicaForm')) }}

            <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                {{ Form::label('user_id','Membro da equipe:',['class'=>'col-sm-2 control-label'])}}
              <div class="col-sm-4">
                  <select class="select-usuario-colaborador" name="user_id">
                      <option value=""></option>
                      @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id}}">{{ $usuario->name}}</option>
                      @endforeach
                  </select>
                @if ($errors->has('user_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_id') }}</strong>
                    </span>
                @endif
                </div>
            </div>

            @include('musica.colaboradores.form',[
                'submitButton'=>'Adicionar membro na equipe de música'
                ])


        {{ Form::close() }}
    </div>





@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $(".select-usuario-colaborador").select2({
                placeholder: 'Escolha um dos usuários cadastrados',
                allowClear: true,
                width: '100%'
            });

            $(".image-picker").imagepicker({
                show_label: true
            });
        });
    </script>

@endsection
