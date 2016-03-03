<li class="panel panel-default dropdown">
  <a data-toggle="collapse" href="#dropdown-retiros">
      <span class="icon fa fa-home"></span><span class="title">Retiros</span>
  </a>
  <!-- Dropdown level 1 -->
  <div id="dropdown-retiros" class="panel-collapse collapse">
    <div class="panel-body">
      <ul class="nav navbar-nav">
        <li><a href="#"><span class="icon fa fa-calendar"></span>Eventos</a></li>
        <li><a href="#"><span class="icon fa fa-user"></span>Inscritos</a></li>
        <li><a href="#"><span class="icon fa fa-money"></span>Pagamento</a></li>
        <li><a href="{{ URL::to('/retiros/grupos')}}"><span class="icon fa fa-users"></span>Grupos</a></li>
        <li><a href="#"><span class="icon fa fa-commenting-o"></span>Comunicação</a></li>
        <li><a href="#"><span class="icon fa fa-thumbs-o-up"></span>Permissões</a></li>        
      </ul>
    </div>
  </div>
</li>
