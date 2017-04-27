@if(isset($data["usuario.sem-telefone"]))
    <div class="alert alert-warning alert-important">
        Você não tem um número de telefone cadastrado. Para atualizar seu perfil clique
        <a href="{{ URL::route('usuario.perfil') }}">
            aqui</a>
    </div>
@endif
@if(isset($data["usuario.usuarios-sem-perfil"]))
<div class="panel panel-default panel-dashboard">
  <div class="panel-heading">Usuários</div>
  <div class="panel-body">

          <h4>Usuários sem perfis definidos</h4>
          <p>Os usuário abaixo ainda não possuem nenhum perfil definido, clique nos nomes para
          definir um perfil.</p>
          <ul>
              @foreach ($data["usuario.usuarios-sem-perfil"] as $usuario)
                  <li><a href="{{ URL::route('usuario.permissoes.edit', $usuario->id) }}">{{$usuario->name}} - {{$usuario->email}}</a></li>
              @endforeach
          </ul>

  </div>
</div>
@else
    <div class="alert">Todos usuários com pelo menos um perfil definido!</div>
@endif
