{{--
  <a href="{{ URL::route('retiros') }}" class="logo">
    {{ HTML::image('img/diakonia-logo.png') }}
--}}
<nav class="navbar navbar-default navbar-fixed-top navbar-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-expand-toggle">
            <i class="fa fa-bars icon"></i>
        </button>
        {{-- Título da Página --}}
        <ol class="breadcrumb navbar-breadcrumb">
            <li class="active">Diakonia</li>
        </ol>
        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
            <i class="fa fa-th icon"></i>
        </button>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
          <i class="fa fa-times icon"></i>
      </button>
      <li class="dropdown profile">
        @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
        @else
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu animated fadeInDown">
            <li class="profile-img">
                <img src="../img/profile/picjumbo.com_HNCK4153_resize.jpg" class="profile-img">
            </li>
            <li>
              <div class="profile-info">

                <h4 class="username">Usuário</h4>
                <p>{{ Auth::user()->email }}</p>
                <div class="btn-group margin-bottom-2x" role="group">
                  <button type="button" class="btn btn-default"><i class="fa fa-user"></i> Perfil</button>
                  <button type="button" class="btn btn-default">
                    <a href="{{ url('/logout') }}">
                      <i class="fa fa-btn fa-sign-out"></i>Logout
                    </a>
                  </button>
                </div>
              </div>
            </li>
          </ul>
        @endif
      </li>
    </ul>
  </div>
</nav>
