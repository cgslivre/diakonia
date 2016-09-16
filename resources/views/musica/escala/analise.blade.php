{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2', '<li class="active"><a href="/musica/evento">Eventos</a></li>')
@section('nivel3', '<li class="active">Análise da escala</li>')

    @section('content')
        {{ $warnings }}
{{--
    <div class="">
        <h4 class="destaque">Confirme a escala para o evento:</h4>
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
        <div class="row text-center">
            <div class="col-md-2 text-right destaque">Líder:</div>
            <div class="col-md-6 text-left"><strong>{{$lider->user->name}}</strong></div>
        </div>
    </div>
    <hr/>
    @foreach($servicos as $servico)
        <div class="row add-servico" ng-class-odd="'servico-odd'" ng-class-even="'servico-even'">
            <div class="col-md-2 text-center no-margin">
                <img alt="{{$servico.descricao}}" ng-src="<%serviceIcon(servico.icone_small)%>" class=""/>
                <p class="text-center descricao-servico no-margin">
                    {{$servico.descricao}}
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

        </div>
    @endforeach
--}}

    @endsection

    @section('scripts')

    @endsection
