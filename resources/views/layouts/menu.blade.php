<header class="menu-lateral" role="banner">
    <div class="nav-header">
        <a class="logo" href="#"><img src="{{ url('img/logo-diakonia.png') }}" alt="Diakonia Logo" /></a>
    </div>
    <nav class="nav" role="navigation">
        <ul class="nav__list">
            @can('user-list')
                @include('layouts.menus.usuarios')
            @endcan

            @can('membro-list')
                @include('layouts.menus.membros')
            @endcan

        </ul>
    </nav>
</header>

{{-- <div id="menu-lateral" class="side-menu sidebar-inverse">
<nav  class="navbar navbar-default" role="navigation">
<div class="side-menu-container">
<div class="navbar-header">
<a class="navbar-brand" href="#">
<div class="title">Menu</div>
</a>
<button type="button" class="navbar-expand-toggle pull-right visible-xs">
<i class="fa fa-times icon"></i>
</button>
</div>
<ul class="nav navbar-nav">

@can('user-list')
@include('layouts.menus.usuarios')
@endcan



@can('membro-list')
@include('layouts.menus.membros')
@endcan



</ul>
</div>
<!-- /.navbar-collapse -->
</nav>
</div>
--}}
