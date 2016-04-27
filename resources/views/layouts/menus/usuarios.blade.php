<!-- Dropdown-->
<li class="panel panel-default dropdown">
    <a data-toggle="collapse" href="#component-usuarios">
        <span class="icon fa fa-user"></span><span class="title">Usuários</span>
    </a>
    <!-- Dropdown level 1 -->
    <div id="component-usuarios" class="panel-collapse collapse">
        <div class="panel-body">
            <ul class="nav navbar-nav">
              <li><a href="{{ URL::to('/usuarios')}}"><span class="icon fa fa-th-list"></span>Lista</a></li>
              @can('user-permissions')
              <li><a href="{{ URL::to('/usuario/permissoes')}}"><span class="icon fa fa-thumbs-o-up"></span>Permissões</a></li>
              @endcan
            </ul>
        </div>
    </div>
</li>
