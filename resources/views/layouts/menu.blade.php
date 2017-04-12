<header class="menu-lateral" role="banner">
    <div class="nav-header">
        <a class="logo" href="{{ url('/home') }}">
            <img src="{{ url('img/logo_FRONT-WHITE.png') }}" alt="Diakonia Logo" class="img-responsive" />
        </a>
    </div>
    <nav class="nav" role="navigation">
        <ul class="nav__list">
            @can('user-list')
                @include('layouts.menus.usuarios')
            @endcan

            @can('membro-list')
                @include('layouts.menus.membros')
            @endcan

            @can('evento-view')
                @include('layouts.menus.eventos')
            @endcan

            @if (Auth::user()->isAn('role-geral-admin'))
                @include('layouts.menus.geral')
            @endif

        </ul>
    </nav>
</header>
