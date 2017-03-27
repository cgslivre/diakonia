<header class="menu-lateral" role="banner">
    <div class="nav-header">
        <div class="title">Menu</div>
    </div>
    <nav class="nav" role="navigation">
        <ul class="nav__list">
            @can('user-list')
                @include('layouts.menus.usuarios')
            @endcan

            <li>
                <input id="group-2" type="checkbox" hidden />
                <label for="group-2"><span class="seta fa fa-angle-right"></span> Membros</label>
                <ul class="group-list">
                    <li><a href="/membros">Lista</a></li>
                    <li><a href="#">Grupos Caseiros</a></li>
                    <li><a href="/membros/regiao">Regiões</a></li>
                </ul>
            </li>

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
