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

    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}"
        ng-class="{'has-error' : usuarioForm.email.$invalid && !usuarioForm.email.$pristine}">
        {{ Form::label('email','Email:',['class'=>'col-sm-2 control-label required'])}}
      <div class="col-sm-4">
        <input class="form-control" placeholder="Endereço de email" name="email"
                type="email" id="email" ng-model="usuario.email" ng-required="true"
                ng-remote-validate="/api/usuarios/email" ng-readonly="!emailField">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
      <div ng-show="usuarioForm.email.$dirty" ng-messages="usuarioForm.email.$error">
          <span ng-message="email" class="help-block">
              <strong>O email é inválido.</strong>
          </span>
          <span ng-message="ngRemoteValidate" class="help-block">
              <strong>O email está em uso.</strong>
          </span>
          <span ng-message="required" class="help-block">
              <strong>O email é obrigatório.</strong>
          </span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}"
        ng-class="{'has-error' : usuarioForm.name.$invalid && !usuarioForm.name.$pristine}">
        {{ Form::label('name','Nome:',['class'=>'col-sm-2 control-label required'])}}
      <div class="col-sm-4">

          <input class="form-control" placeholder="Nome do usuário" name="name" type="text"
            ng-model="usuario.name" ng-minlength="2" id="name" ng-required="true">
          @if ($errors->has('name'))
              <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
          @endif
      </div>
      <div ng-show="usuarioForm.name.$dirty" ng-messages="usuarioForm.name.$error">
          <span ng-message="minlength" class="help-block">
              <strong>O nome deve ter no mínimo 2 caracteres.</strong>
          </span>
          <span ng-message="required" class="help-block">
              <strong>O nome é obrigatório.</strong>
          </span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('telefone') ? ' has-error' : '' }}"
        ng-class="{'has-error' : usuarioForm.telefone.$invalid && !usuarioForm.telefone.$pristine}">
        {{ Form::label('telefone','Telefone:',['class'=>'col-sm-2 control-label'])}}
      <div class="col-sm-4">
          <input class="form-control"
          name="telefone" type="text" id="telefone" ng-model="usuario.telefone"
          ui-mask="(99) 9999-?99999" ui-mask-placeholder-char="_">
          @if ($errors->has('telefone'))
              <span class="help-block">
                  <strong>{{ $errors->first('telefone') }}</strong>
              </span>
          @endif
      </div>
    </div>

    @if( $perfil)
        <hr/>
        <p>Caso deseje alterar a senha de acesso, digite a senha atual e a nova senha:</p>
        <div class="form-group{{ $errors->has('old-password') ? ' has-error' : '' }}">
          <label for="old-password" class="col-sm-2 control-label">
            Senha atual
          </label>
          <div class="col-sm-4">
            {{ Form::password('old-password', array('class' => 'form-control', 'id'=> 'old-password')) }}
            @if ($errors->has('old-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('old-password') }}</strong>
                </span>
            @endif
          </div>
        </div>
    @endif
    @if( $passwordForm || $perfil)
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-sm-2 control-label">
                @if( $perfil)
                    Nova
                @endif
                Senha:
            </label>
          <div class="col-sm-4">
              <input class="form-control" id="password" name="password"
              type="password" value="" ng-model="usuario.password">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : '' }}"
            ng-class="{'has-error' : usuarioForm.password_confirm.$invalid && !usuarioForm.password_confirm.$pristine}">
            {{ Form::label('password_confirm','Confirmação da Senha:',['class'=>'col-sm-2 control-label'])}}
          <div class="col-sm-4">
            <input class="form-control" id="password_confirm" name="password_confirm"
                type="password" value="" compare-to="usuario.password"
                ng-model="usuario.password_confirm">
            @if ($errors->has('password_confirm'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirm') }}</strong>
                </span>
            @endif
        </div>
          <div ng-show="usuarioForm.password_confirm.$dirty" ng-messages="usuarioForm.password_confirm.$error">
              <span ng-message="compareTo" class="help-block">
                  <strong>As senhas devem ser iguais.</strong>
              </span>
          </div>
        </div>
    @endif

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <!--<button type="submit" class="btn btn-info" ng-click="criarUsuario(usuario)">-->
          {{-- $submitButton --}}
        <!--</button>-->
        <button class="btn btn-primary"
            ng-disabled="usuarioForm.$invalid">
            @if( $perfil)
                Atualizar Perfil
            @else
                <% button %>
            @endif
        </button>
      </div>
    </div>

  </div>
</div>
