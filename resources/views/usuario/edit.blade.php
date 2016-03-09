@extends( 'master')

@section('titulo', 'Editar usuário')


@section('content')

<div class="container-fluid">
    {{ Form::model($user, array('url' => 'usuario','files' => true, 'class'=> 'form-horizontal')) }}
        @include('usuario.form',['userAvatar'=>$user->avatarPathMedium()
            , 'submitButton'=>'Atualizar usuário'
            , 'readony'=>'readonly'
            , 'passwordForm'=>false])
    {{ Form::close() }}
</div>

@endsection
