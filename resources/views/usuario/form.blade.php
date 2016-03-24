<div class="row">
    @if ($errors->has('remove'))
        <span class="help-block">
            <strong>{{ $errors->first('remove') }}</strong>
        </span>
    @endif
  <div class="col-md-2 text-right">
    <img alt="Foto de Perfil" src="{{ url($userAvatar) }}" class="profile-img">
  </div>
  <div class="col-md-6 bottom-align-text{{ $errors->has('avatar') ? ' has-error' : '' }}">
    {{ Form::file('avatar') }}
    @if ($errors->has('avatar'))
        <span class="help-block">
            <strong>{{ $errors->first('avatar') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="row">
  <div class="col-md-12">

    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        {{ Form::label('email','Email:',['class'=>'col-sm-2 control-label'])}}
      <div class="col-sm-4">
        {{ Form::input('email','email', null, ['class'=>'form-control','placeholder'=>'Endereço de email',$readony])}}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::label('name','Nome:',['class'=>'col-sm-2 control-label'])}}
      <div class="col-sm-4">
        {!! Form::text('name', null ,
          ['class'=>'form-control','placeholder'=>'Nome do usuário'])!!}
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('telefone') ? ' has-error' : '' }}">
        {{ Form::label('telefone','Telefone:',['class'=>'col-sm-2 control-label'])}}
      <div class="col-sm-4">
        {!! Form::text('telefone', null ,
          ['class'=>'form-control','placeholder'=>'(XX) #####-####'])!!}
          @if ($errors->has('telefone'))
              <span class="help-block">
                  <strong>{{ $errors->first('telefone') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('regiao') ? ' has-error' : '' }}">
        {{ Form::label('regiao','Região:',['class'=>'col-sm-2 control-label'])}}
      <div class="col-sm-4">
        @include('layouts.select-regiao',[
            'attr'=>['class'=>'form-control '.$regiao],
            'selected'=>$regiao,
            'name'=>'regiao'])
      </div>
    </div>

    @if( $passwordForm )
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{ Form::label('password','Senha:',['class'=>'col-sm-2 control-label'])}}
          <div class="col-sm-4">
            {{ Form::password('password', array('class' => 'form-control', 'id'=> 'password')) }}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : '' }}">
            {{ Form::label('password_confirm','Confirmação da Senha:',['class'=>'col-sm-2 control-label'])}}
          <div class="col-sm-4">
            {{ Form::password('password_confirm', array('class' => 'form-control', 'id'=> 'password_confirm')) }}
            @if ($errors->has('password_confirm'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirm') }}</strong>
                </span>
            @endif
          </div>
        </div>
    @endif

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info">
          {{ $submitButton }}
        </button>
      </div>
    </div>

  </div>
</div>
