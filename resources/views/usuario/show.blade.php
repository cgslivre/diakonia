@extends( 'master')

@section('titulo', 'Perfil do Usuário')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img alt="Foto de Perfil" src="{{ url($user->avatarPathMedium()) }}" class="profile-img">
            </div>
            <div class="col-sm-offset-0 col-sm-5">
                <p class="name-title-1">{{ $user->name }}</p>
                <p class="name-title-3">{{ $user->email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-2 col-sm-5"></div>
        </div>
        <div class="row"></div>
    </div>

@endsection
