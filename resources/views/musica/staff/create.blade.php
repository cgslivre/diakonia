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
                          <option value="{{ $usuario->id}}">{{ $usuario->name}}</option>
                      @endforeach
                  </select>
                @if ($errors->has('usuario'))
                    <span class="help-block">
                        <strong>{{ $errors->first('usuario') }}</strong>
                    </span>
                @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('lider') ? ' has-error' : '' }}">

              <div class="col-sm-4 col-sm-offset-2">
                  {{-- Form::checkbox('lider', 'isLider', false) --}}
                  <div class="checkbox3 checkbox-success checkbox-inline checkbox-check  checkbox-round">
                      <input type="checkbox" id="lider">
                      <label for="lider">
                          Líder de louvor?
                      </label>
                  </div>
                @if ($errors->has('lider'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lider') }}</strong>
                    </span>
                @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('servicos') ? ' has-error' : '' }}">
                {{ Form::label('servicos','Serviços:',['class'=>'col-sm-2 control-label'])}}
              <div class="col-sm-6">
                  <select multiple="multiple" class="image-picker show-html show-labels" name="">
                      @foreach($servicos as $servico)
                          <option data-img-src="{{url($servico->iconeSmall)}}" value="{{$servico->id}}">
                              {{$servico->descricao}}</option>
                      @endforeach
                  </select>
                @if ($errors->has('servicos'))
                    <span class="help-block">
                        <strong>{{ $errors->first('servicos') }}</strong>
                    </span>
                @endif
                </div>
            </div>


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
