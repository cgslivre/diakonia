@extends( 'usuario.template-usuario')

@section('nivel2')<li class="active">Permissões dos usuários</li>@stop


@section('content')



    <table class="table table-striped table-hover usuarios">
        <thead>
          <tr>
            <th class="text-center col-md-1">#</th>
            <th class="text-center col-md-1"><i class="fa fa-user"></i></th>
            <th>Nome</th>
            <th>Email</th>
            <th class="text-center">Perfis</th>

          </tr>
        </thead>
        <tbody>

            @foreach( $usuarios as $usuario )
            <tr>
                <th class="col-md-1 text-center middle-align"
                    scope="row" title="{{$usuario->id}}">{{$loop->iteration}}</th>
                <td class="col-md-1 text-center">
                    <img alt="Foto de Perfil" src="{{url($usuario->avatarPath())}}"
                        class="profile-img"/>
                </td>
                <td class="middle-align"><a href="{{url('/usuario/'.$usuario->id.'/permissoes')}}">
                    {{$usuario->name}}
                </a></td>
                <td class="middle-align" >{{$usuario->email}}</td>
                <td class="middle-align text-center">
                    @foreach ($usuario->roles as $role)
                        <div class="role-box role-nivel-{{$role->nivel}}">
                            <span class="role-group">{{$role->group}}</span>
                            <span class="role-title">{{$role->title}}</span>
                        </div>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>





@endsection


@section('scripts')

@endsection
