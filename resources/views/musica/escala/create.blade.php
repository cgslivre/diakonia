{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2', '<li class="active"><a href="/musica/evento">Eventos</a></li>')
@section('nivel3', '<li class="active">Criar nova escala</li>')


@section('content')
<div class="" ng-app="musicaStaffRecord" ng-controller="musicaEventoCreateCtrl">
    {{ Form::open(array('route' => ['musica.escala.analise',$evento->id], 'class'=> 'form-horizontal',
            'name'=>'musicaEscalaForm')) }}

    <h3 class="destaque">Criar escala para o evento: {{ $evento->titulo }}</h3>
    <hr/>
    <div class="row text-center">
        <div class="col-md-2 text-right destaque">Título do Evento:</div>
        <div class="col-md-6 text-left">{{$evento->titulo}}</div>
    </div>
    <div class="row text-center">
        <div class="col-md-2 text-right destaque">Data do Evento:</div>
        <div class="col-md-6 text-left">
            {{ Date::parse($evento->hora)->format('l, j \\d\\e F \\d\\e Y \\à\\s H\\hi') }}
            ({{ $evento->hora->diffForHumans()}})
        </div>
    </div>
    <div class="form-group row text-center {{ $errors->has('lider') ? ' has-error' : '' }}" >
        <div class="col-md-2 text-right {{ $errors->has('lider') ? ' has-error' : 'destaque' }}"
            >{{ Form::label('lider','Líder:',['class'=>'control-label'])}}</div>
        <div class="col-md-4 text-left">
            <select class="select-lider" ng-model="lider" name="lider" ng-required="true">
                <option></option>
                @foreach($lideres as $lider)
                    <option value="{{ $lider->id}}">{{ $lider->user->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('lider'))
                <span class="help-block">
                    <strong>{{ $errors->first('lider') }}</strong>
                </span>
            @endif
        </div>

    </div>

    @if ($errors->has('servico'))
        <div class="alert bg-danger alert-important">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{$errors->first('servico')}}
        </div>
    @endif
    <div class="row add-servico" ng-repeat="servico in servicos" ng-class-odd="'servico-odd'" ng-class-even="'servico-even'">
        <div class="col-md-2 text-center no-margin">
            <img alt="<%servico.descricao%>" ng-src="<%serviceIcon(servico.icone_small)%>" class=""/>
            <p class="text-center descricao-servico no-margin">
                <%servico.descricao%>
            </p>
        </div>
        <div class="col-md-9 no-margin staff-selecionados">
            <span ng-show="!staffPorServico[servico.id]" class="loading">
                <i class="fa fa-spinner fa-spin fa-fw"></i> Carregando...
            </span>
            <span ng-show="staffPorServico[servico.id].length == 0" class="sem-usuario">
                <i class="text-danger fa fa-exclamation-triangle" aria-hidden="true">
                </i> Nenhum usuário cadastrado para esse serviço
            </span>
            <div ng-repeat="staff in staffPorServico[servico.id]">
                <div class="escala-staff" ng-click="selectStaff(servico.id,staff.id)" toggle-class>
                    <div class="avatar">
                        <img ng-src="<%avatar(staff.avatar_path)%>" alt="<%staff.name%>" />
                    </div>
                    <div class="dados">
                        <p class="nome"><%staff.name%></p>
                    </div>
                </div>
            </div>

        </div>
        <input ng-repeat="staffSel in staffSelecionado[servico.id]" type="hidden" name="servico-<%servico.id%>[]" value="<%staffSelecionado[servico.id][$index]%>">
    </div>


    <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4 center-block">
                <button class="btn btn-primary" ng-disabled="musicaEscalaForm.$invalid">
                     <i class="fa fa-plus-circle" aria-hidden="true"></i> Criar Escala</button>
            </div>
    </div>



{{ Form::close() }}
</div>

@endsection

@section('scripts')

    <script src="{{ url('js/musica/app-musica-escala-module.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select-lider").select2({
                placeholder: 'Escolha um dos líderes cadastrados',
                allowClear: true,
                width: '100%'
            });
        });
    </script>


@endsection
