<li>
    <input id="group-usuarios" type="checkbox" hidden />
    <label for="group-usuarios">
        <span class="seta fa fa-angle-right"></span> <span class="icon fa fa-user"></span> Usuários
    </label>
    <ul class="group-list">
        <li><a href="{{ URL::to('/usuarios')}}"><span class="icon fa fa-th-list"></span> Lista</a></li>
        @can('user-permissions')
        <li><a href="{{ URL::to('/usuario/permissoes')}}"><span class="icon fa fa-thumbs-o-up"></span> Permissões</a></li>
        @endcan
    </ul>
</li>
