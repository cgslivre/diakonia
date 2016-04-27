<ul class="rolebox">
    <li><span>Usuários: </span> </li>
@forelse( $user->getUsuarioRolesAttribute() as $roleUsuario )
    <li><span class="{{ $roleUsuario }}">
        @if($roleUsuario == 'role-user-admin' )
            Administrador
        @elseif($roleUsuario == 'role-user-manage' )
            Gerente
        @else
            Padrão
        @endif
    </span></li>
@empty
    <li><span class="notrole">Nenhum papel designado</span></li>
@endforelse
</ul>
