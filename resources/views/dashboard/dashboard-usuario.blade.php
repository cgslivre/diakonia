@if(isset($data["usuario.sem-telefone"]))
    <div class="alert alert-warning alert-important">
        Você não tem um número de telefone cadastrado. Para atualizar seu perfil clique
        <a href="{{ URL::route('usuario.perfil') }}">
            aqui</a>
    </div>
@endif
@if(isset($data["usuario.sem-perfil"]))
    <div class="alert alert-warning alert-important">
        Você não tem nenhum perfil definido pelo administrador do sistema.
    </div>
@endif
@can('user-permissions')
<div class="panel panel-default panel-dashboard dashboard-usuario">
  <div class="panel-heading"><i class="fa fa-users" aria-hidden="true"></i> Usuários</div>
  <div class="panel-body">
      @if(isset($data["usuario.usuarios-sem-perfil"]))

          <h4>Usuários sem perfis definidos</h4>
          <p>Os usuário abaixo ainda não possuem nenhum perfil definido, clique nos nomes para
          definir um perfil.</p>
          <ul>
              @foreach ($data["usuario.usuarios-sem-perfil"] as $usuario)
                  <li><i class="fa fa-user" aria-hidden="true"></i>
                      <a href="{{ URL::route('usuario.permissoes.edit', $usuario->id) }}">{{$usuario->name}} - {{$usuario->email}}</a></li>
              @endforeach
          </ul>
      @else
          <div class="alert alert-success alert-important">
              Todos usuários com pelo menos um perfil definido!</div>
      @endif
  </div>
</div>
@endcan
