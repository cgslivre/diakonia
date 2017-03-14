<li class="panel panel-default dropdown">
  <a data-toggle="collapse" href="#dropdown-membros">
      <span class="icon fa fa-address-book-o"></span><span class="title">Membros</span>
  </a>
  <!-- Dropdown level 1 -->
  <div id="dropdown-membros" class="panel-collapse collapse">
    <div class="panel-body">
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::route('membros.lista') }}">
            <span class="icon fa fa-th-list"></span> Lista
        </a></li>
        <li><a href="{{ URL::route('membros.grupo-caseiro') }}">
            <span class="icon fa fa-users"></span> Grupos Caseiros
        </a></li>
        <li><a href="{{ URL::route('regiao.index') }}">
            <span class="icon fa fa-map-signs"></span> Regiões
        </a></li>
      </ul>
    </div>
  </div>
</li>
