<div id="menu-lateral" class="side-menu sidebar-inverse">
  <nav  class="navbar navbar-default" role="navigation">
    <div class="side-menu-container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          <div class="icon fa fa-pencil-square-o"></div>
          <div class="title">Menu</div>
        </a>
        <button type="button" class="navbar-expand-toggle pull-right visible-xs">
            <i class="fa fa-times icon"></i>
        </button>
      </div>
      <ul class="nav navbar-nav">

        @include('layouts.menus.retiros')

        @include('layouts.menus.musica')

        @include('layouts.menus.criancas')

        @include('layouts.menus.contatos')

      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </nav>
</div>
