@extends( 'usuario.template-usuario')

@section('nivel2')<li class="active">Lista de Usuários</li>@stop


@section('content')

<div ng-app="usuariosRecord">

    <div class="form-group input-group-lg">
        <input type="text" ng-model="criterioDeBusca" class="form-control"
            placeholder="Quem você está buscando..."/>
    </div>
    @can('user-create')
    <a href="{{ url('/usuario/create') }}" class="btn btn-success">
        <i class="fa fa-user-plus"></i> Criar novo usuário
    </a>
    @endcan



    <hr/>
    <div ng-controller="usuariosController">
        <div class="loading text-center" ng-show="carregando">
            <i class="fa fa-spinner fa-pulse fa-fw"></i> Carregando...
        </div>
        <div class="search-result">
            <p ng-show="!usuariosFiltered.length">
                <span class="counter">Nenhum</span> usuário encontrado.
            </p>
            <p ng-show="usuariosFiltered.length == 1">
                <span class="counter">Um</span> usuário encontrado.
            </p>
            <p ng-show="usuariosFiltered.length >  1">
                <span class="counter"><%usuariosFiltered.length%></span> usuários encontrados.
            </p>
        </div>
        <table ng-show="usuarios.length > 0" class="table table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center col-md-1">#</th>
                <th class="text-center col-md-1"><i class="fa fa-user"></i></th>
                <th><a href="" ng-click="ordenarPor('name')">Nome
                    <i class="fa fa-sort-alpha-desc" aria-hidden="true" ng-show="criterioDeOrdenacao=='name' && direcaoDaOrdenacao"></i>
                    <i class="fa fa-sort-alpha-asc" aria-hidden="true" ng-show="criterioDeOrdenacao=='name' && !direcaoDaOrdenacao"></i>
                </a></th>
                <th><a href="" ng-click="ordenarPor('email')">Email
                    <i class="fa fa-sort-alpha-desc" aria-hidden="true" ng-show="criterioDeOrdenacao=='email' && direcaoDaOrdenacao"></i>
                    <i class="fa fa-sort-alpha-asc" aria-hidden="true" ng-show="criterioDeOrdenacao=='email' && !direcaoDaOrdenacao"></i>
                </a></th>
                <th>Telefone</th>                
                @can('user-edit')
                <th class="text-center col-md-1"><i class="fa fa-pencil-square-o"></i></th>
                @endcan
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="usuario in usuariosFiltered = ( usuarios | filter:criterioDeBusca | orderBy:criterioDeOrdenacao:direcaoDaOrdenacao)">
                    <th class="col-md-1 text-center middle-align" scope="row" title="<%usuario.id%>"><%($index+1)%></th>
                    <td class="col-md-1 text-center">
                        <img alt="Foto de Perfil" ng-src="<%avatarPathSmall(usuario.avatar_path)%>" class="profile-img"/>
                    </td>
                    <td class="middle-align"><a
                        @can('user-view')
                            href="<%userShowLink(usuario.id)%>"
                        @endcan
                        ng-bind-html="usuario.name | highlight:criterioDeBusca"></a></td>
                    <td class="middle-align" ng-bind-html="usuario.email | highlight:criterioDeBusca"></td>
                    <td class="middle-align"
                        ng-bind-html="usuario.telefone | formatPhone | highlight:criterioDeBusca "></td>
                    @can('user-edit')
                    <td class="col-md-1 text-center middle-align">
                        <a href="<% userEditLink(usuario.id) %>" title="Editar Usuário">
                            <i class="fa fa-pencil-square fa-2x"></i>
                        </a>
                    </td>
                    @endcan
                </tr>
            </tbody>
        </table>

    </div>

@endsection

@section('scripts')
    <script src="{{ url('js/users/app-users-module.min.js') }}"></script>

@endsection
</div>
