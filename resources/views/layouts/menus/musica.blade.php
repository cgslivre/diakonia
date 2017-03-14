<li class="panel panel-default dropdown">
  <a data-toggle="collapse" href="#dropdown-musica">
      <span class="icon fa fa-music"></span><span class="title">Música</span>
  </a>
  <!-- Dropdown level 1 -->
  <div id="dropdown-musica" class="panel-collapse collapse">
    <div class="panel-body">
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::route('musica.calendario') }}"><span class="icon fa fa-calendar"></span> Calendário</a></li>
        <li><a href="{{ URL::route('evento.index') }}"><span class="icon fa fa-calendar-o"></span> Eventos</a></li>
        <li><a href="{{ URL::route('staff.index') }}"><span class="icon fa fa-users"></span> Equipe</a></li>
      </ul>
    </div>
  </div>
</li>
