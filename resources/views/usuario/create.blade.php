@extends( 'master')

@section('titulo', 'Criar novo usuário')



@section('content')
<div class="container-fluid" ng-app="usuariosRecord" ng-controller="userCreateCtrl">

        <form name="usuarioForm" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            @include('usuario.form',['userAvatar'=>'users/avatar/000-default-150px.jpg'
                , 'submitButton'=>'Criar usuário'
                , 'readony'=>null
                , 'regiao'=>null
                , 'passwordForm'=>true])

        </form>

</div>
@endsection

@section('scripts')
    <script src="{{ url('js/users/app-users-module.min.js') }}"></script>
    <script src="{{ url('js/users/users-create-ctrl.min.js') }}"></script>
@endsection
