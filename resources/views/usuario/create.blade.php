@extends( 'master')

@section('titulo', 'Criar novo usuário')


@section('content')

<div class="container-fluid">
    {{ Form::open(array('url' => 'usuario','files' => true, 'class'=> 'form-horizontal')) }}
        @include('usuario.form',['userAvatar'=>'users/avatar/000-default-150px.jpg'
            , 'submitButton'=>'Criar usuário'
            , 'readony'=>null
            , 'regiao'=>null
            , 'passwordForm'=>true])
    {{ Form::close() }}
</div>

@endsection
