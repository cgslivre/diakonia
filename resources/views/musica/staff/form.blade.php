<div class="form-group {{ $errors->has('lideranca') ? ' has-error' : '' }}">

  <div class="col-sm-4 col-sm-offset-2">
      {{-- Form::checkbox('lider', 'isLider', false) --}}
      <div class="checkbox3 checkbox-success checkbox-inline checkbox-check  checkbox-round">
            @if(empty($staff))
                {{ Form::checkbox('lideranca', false , null ,['id'=>'lideranca']) }}
            @elseif($staff->lideranca)
                {{ Form::checkbox('lideranca', 'on',null,['id'=>'lideranca']) }}
            @else
                {{ Form::checkbox('lideranca', null,null,['id'=>'lideranca']) }}
            @endif


          <!--<input type="checkbox" id="lideranca" name="lideranca">-->
          <label for="lideranca">
              Líder de louvor?
          </label>
      </div>
    @if ($errors->has('lideranca'))
        <span class="help-block">
            <strong>{{ $errors->first('lideranca') }}</strong>
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
                  @if(!empty($staff))
                      @if(in_array($servico->id,$staff->servicosArray))
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
          <button class="btn btn-info">
              <i class="fa fa-check" aria-hidden="true"></i> {{  $submitButton }}
          </button>
          @if(!empty($staff))
              <a href="{{ URL::route('musica.staff.remover', $staff->id) }}"
                 class="btn btn-danger">
                 <i class="fa fa-trash" aria-hidden="true"></i> Remover evento
              </a>

          @endif
      </div>
  </div>
</div>
