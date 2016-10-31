@extends( 'membro.template-membro')

@section('nivel2', '<li class="active">Lista de Membros</li>')


@section('content')

<div ng-app="membrosRecord">

    <div class="form-group input-group-lg">
        <input type="text" ng-model="criterioDeBusca" class="form-control"
            placeholder="Quem você está buscando..."/>
    </div>

    <a href="{{ url('/membro/create') }}" class="btn btn-success">
        <i class="fa fa-user-plus"></i> Cadastrar novo membro
    </a>

    <hr/>
    <div ng-controller="membrosIndexController">
        <div class="search-result">
            <p ng-show="!membrosFiltered.length">
                <span class="counter">Nenhum</span> membro encontrado.
            </p>
            <p ng-show="membrosFiltered.length == 1">
                <span class="counter">Um</span> membro encontrado.
            </p>
            <p ng-show="membrosFiltered.length >  1">
                <span class="counter"><%membrosFiltered.length%></span> membros encontrados.
            </p>
        </div>
        <table ng-show="membros.length > 0" class="table table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center col-md-1">#</th>
                <th class="text-center col-md-1"><i class="fa fa-user"></i></th>
                <th><a href="" ng-click="ordenarPor('nome')">Nome
                    <span class="glyphicon glyphicon-sort-by-alphabet-alt" ng-show="criterioDeOrdenacao=='nome' && direcaoDaOrdenacao"></span>
                    <span class="glyphicon glyphicon-sort-by-alphabet" ng-show="criterioDeOrdenacao=='nome' && !direcaoDaOrdenacao"></span>
                </a></th>
                <th><a href="" ng-click="ordenarPor('email')">Email
                    <span class="glyphicon glyphicon-sort-by-alphabet-alt" ng-show="criterioDeOrdenacao=='email' && direcaoDaOrdenacao"></span>
                    <span class="glyphicon glyphicon-sort-by-alphabet" ng-show="criterioDeOrdenacao=='email' && !direcaoDaOrdenacao"></span>
                </a></th>
                <th>Região</th>
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="membro in membrosFiltered = ( membros | filter:criterioDeBusca | orderBy:criterioDeOrdenacao:direcaoDaOrdenacao)">
                    <th class="col-md-1 text-center middle-align" scope="row" title="<%membro.id%>"><%($index+1)%></th>
                    <td class="col-md-1 text-center">
                        <img alt="Foto de Perfil" ng-src="<%avatarPathSmall(membro.avatar_path)%>" class="profile-img"/>
                    </td>
                    <td class="middle-align"><a
                        @can('user-view')
                            href="<%userShowLink(membro.id)%>"
                        @endcan
                        ng-bind-html="membro.nome | highlight:criterioDeBusca"></a></td>
                    <td class="middle-align" ng-bind-html="membro.email | highlight:criterioDeBusca"></td>

                    <td class="middle-align" ng-bind-html="membro.regiao | highlight:criterioDeBusca"></td>

                </tr>
            </tbody>
        </table>

    </div>

@endsection

@section('scripts')
    <script src="{{ url('js/membro/app-membro-module.min.js') }}"></script>

@endsection
</div>
