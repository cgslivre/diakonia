<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}"
            ng-class="{'has-error' : musicaEventoForm.titulo.$invalid && !musicaEventoForm.titulo.$pristine}">
            {{ Form::label('titulo','Título:',['class'=>'col-sm-2 control-label'])}}
            <div class="col-sm-4">
                <input class="form-control" placeholder="Título do Evento" name="titulo"
                        type="text" ng-model="evento.titulo" ng-minlength="3" ng-required="true"
                        id="titulo" value="Encontro Geral">
                @if ($errors->has('titulo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titulo') }}</strong>
                    </span>
                @endif
            </div>
            <div ng-show="musicaEventoForm.titulo.$dirty" ng-messages="musicaEventoForm.titulo.$error">
                <span ng-message="minlength" class="help-block">
                    <strong>O título deve ter no mínimo 3 caracteres.</strong>
                </span>
                <span ng-message="required" class="help-block">
                    <strong>O título é obrigatório.</strong>
                </span>
            </div>
        </div>
        <div class="form-group {{ $errors->has('hora') ? ' has-error' : '' }}"
            ng-class="{'has-error' : musicaEventoForm.hora.$invalid && !musicaEventoForm.hora.$pristine}">
            {{ Form::label('hora','Data e Hora:',['class'=>'col-sm-2 control-label'])}}
            <div class="col-sm-4">
                <input class="form-control" placeholder="dd/mm/YYYY HH:mm" name="hora"
                    ng-model="evento.hora" ng-required="true" datetime="dd/MM/yyyy HH:mm" datetime-model="dd/MM/yyyy HH:mm"
                        type="text" id="hora" date-format>
                @if ($errors->has('hora'))
                    <span class="help-block">
                        <strong>{{ $errors->first('hora') }}</strong>
                    </span>
                @endif
            </div>
            <div ng-show="musicaEventoForm.hora.$dirty" ng-messages="musicaEventoForm.hora.$error">
                <span ng-message="required" class="help-block">
                    <strong>Data e hora são obrigatórias.</strong>
                </span>
                <span ng-message="formato" class="help-block">
                    <strong>Formato errado para data. Usar dd/mm/aaaa HH:mm</strong>
                </span>
            </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-info" ng-disabled="musicaEventoForm.$invalid">
                {{ $submitButton}}
            </button>
          </div>
        </div>
    </div>
</div>
