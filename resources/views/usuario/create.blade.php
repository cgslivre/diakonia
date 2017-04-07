@extends( 'usuario.template-usuario')

@section('nivel3')<li class="active">Criar novo usuário</li>@stop

@section('content')
<div class="container-fluid" ng-app="usuariosRecord" ng-controller="userCreateCtrl">
        {{ Form::open(array('url' => 'usuario','files' => true, 'class'=> 'form-horizontal',
            'name'=>'usuarioForm')) }}
            @include('usuario.form',['userAvatar'=>'users/avatar/000-default-150px.jpg'
                , 'submitButton'=>'Criar usuário'
                , 'readony'=>null
                , 'regiao'=>null
                , 'passwordForm'=>true])
        {{ Form::close() }}

</div>
@endsection

@section('scripts')
    <script src="{{ url('js/users/app-users-module.min.js') }}"></script>
@endsection
