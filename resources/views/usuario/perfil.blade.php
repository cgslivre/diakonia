@extends( 'master')

@section('titulo', 'Perfil')

  @section('content')
    <div class="container-fluid">
      {{ Form::open(array('url' => '/perfil/' . Auth::user()->id . '/editar' ,'files' => true, 'class'=> 'form-horizontal')) }}
      <div class="row">
        <div class="col-md-2 text-right">
          <img alt="Foto de Perfil" src="{{ url(Auth::user()->avatarPathMedium()) }}" class="profile-img">
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

          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">
              Email
            </label>
            <div class="col-sm-4">
              <input type="email" value="{{Auth::user()->email}}" class="form-control" id="inputEmail" readonly/>
            </div>
          </div>

          <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
            <label for="nome" class="col-sm-2 control-label">
              Nome
            </label>
            <div class="col-sm-4">
              {!! Form::text('nome', Auth::user()->name ,
                ['class'=>'form-control','placeholder'=>'Nome do usuário','id'=>'nome'])!!}
                @if ($errors->has('nome'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group">
            <p>Caso deseje alterar a senha de acesso, digite a senha atual e a nova senha:</p>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-sm-2 control-label">
              Senha atual
            </label>
            <div class="col-sm-4">
              {{ Form::password('password', array('class' => 'form-control', 'id'=> 'password')) }}
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group{{ $errors->has('newPassword') ? ' has-error' : '' }}">
            <label for="newPassword" class="col-sm-2 control-label">
              Nova Senha
            </label>
            <div class="col-sm-4">
              {{ Form::password('newPassword', array('class' => 'form-control', 'id'=> 'newPassword')) }}
              @if ($errors->has('newPassword'))
                  <span class="help-block">
                      <strong>{{ $errors->first('newPassword') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group{{ $errors->has('newPassword2') ? ' has-error' : '' }}">
            <label for="newPassword2" class="col-sm-2 control-label">
              Repetir nova Senha
            </label>
            <div class="col-sm-4">
              {{ Form::password('newPassword2', array('class' => 'form-control', 'id'=> 'newPassword2')) }}
              @if ($errors->has('newPassword2'))
                  <span class="help-block">
                      <strong>{{ $errors->first('newPassword2') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">
                Atualizar perfil
              </button>
            </div>
          </div>

        </div>
      </div>
      {{ Form::close() }}
    </div>
  @endsection
