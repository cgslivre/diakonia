@extends( 'master')

@section('titulo', 'Lista de Usuários')


@section('content')

<div ng-app="usuariosRecord">


    <a href="{{ url('/usuario/create') }}" class="btn btn-success">Criar novo usuário</a>
    <hr/>
    <div ng-controller="usuariosController">
        <table ng-show="usuarios.length > 0" class="table table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center col-md-1">#</th>
                <th class="text-center col-md-1"><i class="fa fa-user"></i></th>
                <th>Nome</th>
                <th>Email</th>
                <th class="text-center col-md-1"><i class="fa fa-pencil-square-o"></i></th>
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="usuario in usuarios">
                    <th class="col-md-1 text-center middle-align" scope="row" title="<%usuario.id%>"><%($index+1)%></th>
                    <td class="col-md-1 text-center">
                        <img alt="Foto de Perfil" ng-src="<%avatarPathSmall(usuario.avatar_path)%>" class="profile-img"/>
                    </td>
                    <td class="middle-align"><a href="<%userShowLink(usuario.id)%>"><%usuario.name%></a></td>
                    <td class="middle-align"><%usuario.email%></td>
                    <td class="col-md-1 text-center middle-align">
                        <a href="<% userEditLink(usuario.id) %>" title="Editar Usuário">
                            <i class="fa fa-pencil-square fa-2x"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

@endsection

@section('scripts')
    <script src="{{ url('js/ajs/app-users-module.min.js') }}"></script>    
@endsection
</div>
