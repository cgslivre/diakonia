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

        <code>{{$user->getAbilities()->pluck('name')}}</code>

        <h3>Perfis</h3>

        @foreach ($rolesGroup as $roles)
            <div class="panel panel-default permissoes">
              <div class="panel-heading"><strong>{{ $roles->first()->scope }}</strong></div>
              <div class="panel-body">
                @foreach ($roles as $role)
                    <div class="row">
                        <div class="col-md-2 text-right"><strong>{{$role->title}}</strong></div>
                        <div class="col-md-10">
                            @foreach ($role->getAbilities()->pluck('title') as $key => $value)
                                <span class="habilidade">
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                {{$value}}
                            </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <div class="row permissao-form">
                    <div class="col-md-3 text-right"><strong>Permissões do Usuário:</strong></div>
                    <div class="col-md-9">
                        {{Form::open(array('action' => ['UsuarioPermissoesController@update',$user->id]
                            ,'name'=>'frm-edit-permissoes'))}}
                            <div class="checkbox3 checkbox-success checkbox-inline checkbox-check  checkbox-round">
                                <input type="radio" name="permissao[]"
                                value="" id="nenhum" checked>
                                <label for="nenhum">Nenhuma</label>
                            </div>
                            @foreach ($roles as $role)
                            <div class="checkbox3 checkbox-success checkbox-inline checkbox-check  checkbox-round">
                                <input type="radio" name="permissao[]"
                                value="{{$role->name}}" id="{{$role->name}}"
                                {{ $user->isAn($role->name)? "checked" : "" }}>
                                <label for="{{$role->name}}">{{$role->title}}</label>
                            </div>
                            @endforeach
                        {!! Form::close() !!}
                    </div>
                </div>
              </div>
            </div>

        @endforeach


    </div>

@endsection


@section('scripts')

@endsection
