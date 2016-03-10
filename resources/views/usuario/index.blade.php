@extends( 'master')

@section('titulo', 'Lista de Usuários')


@section('content')

    <a href="{{ url('/usuario/create') }}" class="btn btn-success">Criar novo usuário</a>

    <table class="table table-striped table-hover">
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
            @foreachIndexed( $usuarios as $usuario )

                <tr>
                    <th class="col-md-1 text-center middle-align" scope="row" title="{{ $usuario->id }}">@index</th>
                    <td class="col-md-1 text-center"><img alt="Foto de Perfil" src="{{ url($usuario->avatarPathSmall()) }}" class="profile-img"></td>
                    <td class="middle-align">{{ $usuario->name }}</td>
                    <td class="middle-align">{{ $usuario->email }}</td>
                    <td class="col-md-1 text-center middle-align">
                        <a href="{{ url('/usuario/'. $usuario->id .'/edit') }}" title="Editar Usuário"><i class="fa fa-pencil-square fa-2x"></i></a>
                    </td>
                </tr>


            @endforeachIndexed
        </tbody>
    </table>



@endsection
