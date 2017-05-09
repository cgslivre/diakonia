<div class="form-group {{ $errors->has('lider') ? ' has-error' : '' }}">

  <div class="col-sm-4 col-sm-offset-2">
      {{-- Form::checkbox('lider', 'isLider', false) --}}
      <div class="checkbox3 checkbox-success checkbox-inline checkbox-check  checkbox-round">
            @if(empty($colaborador))
                <input type="checkbox" id="lider" name="lider">
            @elseif($colaborador->lider)
                {{ Form::checkbox('lider', 'on',null,['id'=>'lider']) }}
            @else
                {{ Form::checkbox('lider', null,null,['id'=>'lider']) }}
            @endif


          <!--<input type="checkbox" id="lider" name="lider">-->
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

<div class="form-group {{ $errors->has('servico') ? ' has-error' : '' }}">
    {{ Form::label('servico','Serviços:',['class'=>'col-sm-2 control-label'])}}
  <div class="col-sm-6">
      <select multiple="multiple" class="image-picker show-html show-labels" name="servico[]" id="servico">
          @foreach($servicos as $servico)
              <option data-img-src="{{url($servico->iconeSmall)}}" value="{{$servico->id}}"
                  @if(!empty($colaborador))
                      @if(in_array($servico->id,$colaborador->servicos->pluck('id')->toArray()))
                            selected
                      @endif
                  @endif
                  >
                  {{$servico->descricao}}</option>
          @endforeach
      </select>
    @if ($errors->has('servico'))
        <span class="help-block">
            <strong>{{ $errors->first('servico') }}</strong>
        </span>
    @endif
    </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
      <div class="btn-group">
          <button class="btn btn-primary">
              <i class="fa fa-check" aria-hidden="true"></i> {{  $submitButton }}
          </button>
          @if(!empty($colaborador))
              {{-- <a href="{{ URL::route('musica.colaborador.remover', $colaborador->id) }}"
                 class="btn btn-danger">
                 <i class="fa fa-trash" aria-hidden="true"></i> Remover
              </a> --}}

          @endif
      </div>
  </div>
</div>
