{{--@if($errors->has())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
--}}
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

   {{-- Nome --}}
    <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}"
      ng-class="{'has-error' : membroForm.nome.$invalid && !membroForm.nome.$pristine}">
      {{ Form::label('nome','Nome:',['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-4">

            <input class="form-control" placeholder="Nome completo" name="nome" type="text"
              ng-model="membro.nome" ng-minlength="2" id="nome" ng-required="true" tabindex="1">
            @if ($errors->has('nome'))
                <span class="help-block"><strong>{{ $errors->first('nome') }}</strong></span>
            @endif
        </div>
        <div ng-show="membroForm.name.$dirty" ng-messages="membroForm.name.$error">
            <span ng-message="minlength" class="help-block">
                <strong>O nome deve ter no mínimo 2 caracteres.</strong>
            </span>
            <span ng-message="required" class="help-block">
                <strong>O nome é obrigatório.</strong>
            </span>
        </div>
    </div>

    {{-- Grupo Caseiro --}}
    <div class="form-group">
        {{ Form::label('grupo_caseiro_id','Grupo Caseiro:',['class'=>'col-sm-2 control-label'])}}
      <div class="col-sm-4">
          <select name="grupo_caseiro_id" id="grupo_caseiro_id" tabindex="2"
                    ng-options="g.nome for g in grupos track by g.id"
                    ng-model="membro.grupo_caseiro_id">
                <option></option>
        </select>
      </div>
    </div>

    {{-- Sexo --}}
    <div class="form-group">
        {{ Form::label('sexo','Sexo:',['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-4">
            <div class="radio3 radio-check radio-success radio-inline">
                <input type="radio" name="sexo" ng-model="membro.sexo"
                    id="sexo-masculino" value="M" required>
                <label for="sexo-masculino">Masculino</label>
            </div>
            <div class="radio3 radio-check radio-success radio-inline">
                <input type="radio" name="sexo" ng-model="membro.sexo"
                    id="sexo-feminino" value="F" required>
                <label for="sexo-feminino">Feminino</label>
            </div>
        </div>
    </div>

    {{-- Data Nascimento --}}
    <div class="form-group {{ $errors->has('hora') ? ' has-error' : '' }}"
        ng-class="{'has-error' : membroForm.data_nascimento.$invalid && !membroForm.data_nascimento.$pristine}">
        {{ Form::label('data_nascimento','Data de Nascimento:',['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-4">
            <input class="form-control" placeholder="dd/mm/AAAA" name="data_nascimento"
                ng-model="membro.data_nascimento" ng-required="true" datetime="dd/MM/yyyy" datetime-model="dd/MM/yyyy"
                    type="text" id="data_nascimento">
                    <span class="idade"></span>
            @if ($errors->has('hora'))
                <span class="help-block">
                    <strong>{{ $errors->first('hora') }}</strong>
                </span>
            @endif
        </div>
        <div ng-show="membroForm.datanascimento.$dirty" ng-messages="membroForm.datanascimento.$error">
            <span ng-message="required" class="help-block">
                <strong>Data de Nascimento é obrigatória.</strong>
            </span>
        </div>
    </div>

    {{-- Região --}}
    <div class="form-group">
        {{ Form::label('regiao','Região:',['class'=>'col-sm-2 control-label'])}}
      <div class="col-sm-4">
          <select name="regiao" id="regiao"
                    ng-options="r.nome for r in regioes track by r.nome"
                    ng-model="membro.regiao">
                        <option></option>
                    </select>
      </div>
    </div>

    {{-- Endereço --}}
    <div class="form-group">
      {{ Form::label('endereco','Endereço:',['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-4">
            <input class="form-control" placeholder="Endereço" name="endereco" type="text"
              ng-model="membro.endereco" id="endereco">
        </div>
    </div>

    {{-- Email --}}
    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}"
        ng-class="{'has-error' : membroForm.email.$invalid && !membroForm.email.$pristine}">
        {{ Form::label('email','Email:',['class'=>'col-sm-2 control-label'])}}
      <div class="col-sm-4">
        <input class="form-control" placeholder="Endereço de email" name="email"
                type="email" id="email" ng-model="membro.email">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
      <div ng-show="membroForm.email.$dirty" ng-messages="membroForm.email.$error">
          <span ng-message="email" class="help-block">
              <strong>O email é inválido.</strong>
          </span>
      </div>
    </div>


    {{-- Telefones --}}

    <div class="form-group">
        {{ Form::label('telefone','Telefone(s):',['class'=>'col-sm-2 control-label'])}}
      <div class="col-sm-4">
          <div class="phone-list">
              <div class="input-group phone-input">
              <span class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle"
                        data-toggle="dropdown"
                        aria-expanded="false">
                        <span class="type-text">Tipo</span> <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="changeType" href="javascript:;" data-type-value="celular">Celular</a></li>
                        <li><a class="changeType" href="javascript:;" data-type-value="residencial">Residencial</a></li>
                        <li><a class="changeType" href="javascript:;" data-type-value="comercial">Comercial</a></li>
                    </ul>
                </span>
                <input type="hidden" name="telefone[1][tipo]" class="type-input" value="" />
                <input type="text" name="telefone[1][numero]" class="form-control" placeholder="99999 9999" />
              </div>

          </div>
          <button type="button" class="btn btn-success btn-sm btn-add-phone">
              <span class="glyphicon glyphicon-plus"></span> Adicionar outro telefone</button>
      </div>

    </div>




    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-info"
            ng-disabled="membroForm.$invalid">
                <% button %>
        </button>
      </div>
    </div>

  </div>
</div>
