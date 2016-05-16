@extends( 'musica.template-musica')

@section('nivel2', '<li class="active"><a href="/musica/staff">Equipe</a></li>')
@section('nivel3', '<li class="active">Novo membro da equipe de música</li>')


@section('content')

    <div class="container-fluid">
        {{ Form::open(array('url' => 'musica/staff', 'class'=> 'form-horizontal',
            'name'=>'musicaStaffForm')) }}

            <div class="form-group {{ $errors->has('usuario') ? ' has-error' : '' }}">
                {{ Form::label('usuario','Membro da equipe:',['class'=>'col-sm-2 control-label'])}}
              <div class="col-sm-4">
                  <select class="select-usuario-staff" name="usuario">
                      <option value=""></option>
                      @foreach($usuarios as $usuario)
                          @if($usuariosCadastrados->contains($usuario->id))
                              <option disabled="disabled" value="{{ $usuario->id}}">{{ $usuario->name}} (Usuário já cadastrado)</option>
                          @else
                              <option value="{{ $usuario->id}}">{{ $usuario->name}}</option>
                          @endif
                      @endforeach
                  </select>
                @if ($errors->has('usuario'))
                    <span class="help-block">
                        <strong>{{ $errors->first('usuario') }}</strong>
                    </span>
                @endif
                </div>
            </div>

            @include('musica.staff.form',[
                'submitButton'=>'Adicionar membro na equipe de música'
                ])


        {{ Form::close() }}
    </div>





@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $(".select-usuario-staff").select2({
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
