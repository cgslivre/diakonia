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
        <img alt="Foto de Perfil" ng-src="<%membro.avatar_path%>" class="profile-img-membro" >
    </div>

    <div class="col-md-2 bottom-align-text{{ $errors->has('avatar') ? ' has-error' : '' }}">

        {{ Form::file('avatar',['id'=>'avatar']) }}
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
            <label for="nome" class="col-sm-2 control-label"><span class="required">*</span>Nome:</label>
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
                <select name="grupo_caseiro_id" id="grupo_caseiro_id" class="form-control"
                ng-model="membro.grupo"
                tabindex="2"
                ng-options="g as g.nome for g in grupos track by g.id">
                <option ng-show="!edit" value="">Escolha um grupo caseiro</option>
            </select>
        </div>
    </div>


    {{-- Sexo --}}
    <div class="form-group">
        <label for="drco" class="col-sm-2 control-label"><span class="required">*</span>Sexo:</label>
        <div class="col-sm-4">
            <div class="radio3 radio-check radio-success radio-inline">
                <input type="radio" name="sexo" ng-model="membro.sexo"
                id="sexo-masculino" value="M" required  tabindex="3">
                <label for="sexo-masculino">Masculino</label>
            </div>
            <div class="radio3 radio-check radio-success radio-inline">
                <input type="radio" name="sexo" ng-model="membro.sexo"
                id="sexo-feminino" value="F" required  tabindex="4">
                <label for="sexo-feminino">Feminino</label>
            </div>
        </div>
    </div>

    {{-- Data Nascimento --}}
    <div class="form-group">
        <label for="data_nascimento" class="col-sm-2 control-label">
            <span class="required">*</span>Data de Nascimento:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" ng-model="membro.data_nascimento" is-open="focus"
                ng-focus="focus=true" datepicker-options="dateOptions" show-button-bar="false"
                uib-datepicker-popup="d/M/yyyy" ng-required="true" name="data_nascimento"/>
            </div>
        </div>

        {{-- Região --}}
        <div class="form-group">
            {{ Form::label('regiao','Região:',['class'=>'col-sm-2 control-label'])}}
            <div class="col-sm-4">
                <select name="regiao" id="regiao" class="form-control"
                ng-model="membro.regiao"  tabindex="6">
                <option ng-selected="true" value="" ng-show="!edit">Selecione uma região...</option>
                <option data-ng-repeat="r in regioes" value="<%r.nome%>"
                    ng-selected="membro.regiao==r.nome"
                    ><%r.nome%></option>
                </select>
            </div>
        </div>

        {{-- Endereço --}}
        <div class="form-group">
            {{ Form::label('endereco','Endereço:',['class'=>'col-sm-2 control-label'])}}
            <div class="col-sm-4">
                <input class="form-control" placeholder="Endereço" name="endereco" type="text"
                ng-model="membro.endereco" id="endereco"  tabindex="7">
            </div>
        </div>

        {{-- Email --}}
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}"
            ng-class="{'has-error' : membroForm.email.$invalid && !membroForm.email.$pristine}">
            {{ Form::label('email','Email:',['class'=>'col-sm-2 control-label'])}}
            <div class="col-sm-4">
                <input class="form-control" placeholder="Endereço de email" name="email"
                type="email" id="email" ng-model="membro.email"  tabindex="8">
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
                    <div class="input-group phone-input" ng-show="!membro.telefones">
                        {{-- Apenas para criação (telefone em branco)--}}
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
                        <input type="text" name="telefone[1][numero]"
                        class="form-control" placeholder="99999 9999"
                        tabindex="9"/>
                    </div>
                    {{-- Edição--}}
                    <div class="input-group phone-input" ng-repeat="tel in membro.telefones">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown"
                            aria-expanded="false">
                            <span class="type-text"><%tel.tipo%></span> <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="changeType" href="javascript:;" data-type-value="celular">Celular</a></li>
                                <li><a class="changeType" href="javascript:;" data-type-value="residencial">Residencial</a></li>
                                <li><a class="changeType" href="javascript:;" data-type-value="comercial">Comercial</a></li>
                            </ul>
                        </span>
                        <input type="hidden" name="telefone[1][tipo]" class="type-input" value="<%tel.tipo%>" />
                        <input type="text" name="telefone[1][numero]" class="form-control" placeholder="99999 9999" value="<%tel.numero%>"/>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-sm btn-add-phone">
                    <i class="fa fa-plus" aria-hidden="true"></i> Adicionar outro telefone</button>
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-info"   tabindex="10"
                    ng-disabled="membroForm.$invalid">
                    <% button %>
                </button>
            </div>
        </div>

    </div>
</div>
