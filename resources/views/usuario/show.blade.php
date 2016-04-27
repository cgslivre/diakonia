@extends( 'usuario.template-usuario')

@section('nivel2', '<li class="active">Dados do usuário</li>')


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
            <div class="col-sm-2 text-right lead">Telefone:</div>
            <div class="col-sm-5 lead phone"><strong>{{$user->telefone}}</strong></div>
        </div>

        <div class="row">
            <div class="col-sm-2 text-right lead">Região:</div>
            <div class="col-sm-5 lead"><strong>{{$user->regiao}}</strong></div>
        </div>

        <hr/>

        <div class="row"><div class="col-sm-2 text-right lead">Permissões:</div></div>

        <div class="row">
            <div class="col-sm-offset-2 col-sm-5 lead">
                @include('usuario.permissons-labels')
            </div>
        </div>

    </div>

@endsection


@section('scripts')
    <script type="text/javascript">
        var tel = $('.phone').text();
        $('.phone').text(formatPhone(tel));
    </script>
@endsection
