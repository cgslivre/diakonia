@extends( 'usuario.template-usuario')

@section('nivel2', '<li class="active"><a href="' . URL::route('usuario.permissoes') . '">Permissões dos usuários</a></li>')
@section('nivel3', '<li class="active">Alterar Permissões do usuário</li>')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2 text-right">
                <img alt="Foto de Perfil" src="{{ url($user->avatarPathMedium()) }}" class="profile-img">
            </div>
            <div class="col-md-8">
                <h3>{{$user->name}}</h3>
                <p>{{ $user->email}}</p>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="icon fa fa-user"></span> Perfis para administração de Usuário</h3>
            </div>
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>Perfil Padrão</dt>
                    <dd>Pode visualizar lista de usuários, visualizar perfil de um usuário específico</dd>

                    <dt>Perfil Gerente</dt>
                    <dd>Pode editar usuários, criar novo usuário. <mark>(inclui permissões do perfil Usuário: Padrão)</mark></dd>

                    <dt>Perfil Administrador</dt>
                    <dd>Pode remover usuários e alterar permissões de outros usuários. <mark>(inclui permissões do perfil Usuário: Gerente)</mark></dd>
                </dl>

                <div class="">
                    {!! Form::open(array('action' => ['UsuarioPermissoesController@update',$user->id],'name'=>'usr-perfil-padrao-form',
                        'class'=>'inline')) !!}
                        {{ Form::hidden('user-perfil', 'role-user-users')  }}
                        {{ Form::submit('Padrão',['class'=>$user->is('role-user-users')?'btn btn-success':'btn btn-default']) }}
                    {!! Form::close() !!}
                    {!! Form::open(array('action' => ['UsuarioPermissoesController@update',$user->id],'name'=>'usr-perfil-gerente-form',
                        'class'=>'inline')) !!}
                        {{ Form::hidden('user-perfil', 'role-user-manage')  }}
                        {{ Form::submit('Gerente',['class'=>$user->is('role-user-manage')?'btn btn-success':'btn btn-default']) }}
                    {!! Form::close() !!}
                    {!! Form::open(array('action' => ['UsuarioPermissoesController@update',$user->id],'name'=>'usr-perfil-admin-form',
                        'class'=>'inline')) !!}
                        {{ Form::hidden('user-perfil', 'role-user-admin')  }}
                        {{ Form::submit('Administrador',['class'=>$user->is('role-user-admin')?'btn btn-success':'btn btn-default']) }}
                    {!! Form::close() !!}

                </div>

            </div>
        </div>

        {{--
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="icon fa fa-home"></span> Perfis para administração de Retiros</h3>
            </div>
            <div class="panel-body">
                ...
            </div>
        </div>
        --}}

    </div>

@endsection


@section('scripts')

@endsection
