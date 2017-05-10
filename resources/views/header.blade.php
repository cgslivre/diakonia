<div id="topo" class="container-fluid">

  <ul class="nav navbar-nav navbar-right">
    <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
      <i class="fa fa-times icon"></i>
    </button>
    <li class="dropdown profile">
      @if (Auth::guest())
      <li><a href="{{ url('/login') }}">Login</a></li>
      @else
      <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown" role="button" aria-expanded="false">
        <span class="icon fa fa-user"></span> {{ Auth::user()->name }} <span class="caret"></span>
      </a>
      <ul class="dropdown-menu animated fadeInDown">
        <li class="profile-img">
          <img src="{{ url(Auth::user()->avatarPath()) }}" class="profile-img">
        </li>
        <li>
          <div class="profile-info">
            <p>{{ Auth::user()->email }}</p>
            <div class="btn-group margin-bottom-2x" role="group">
              <a href="{{ url('/perfil') }}" class="btn btn-default">
                  <i class="fa fa-user"></i> Perfil
              </a>

              <a href="{{ url('/logout') }}" class="btn btn-info"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-btn fa-sign-out"></i> Logout
              </a>
              <form id="logout-form" action="{{ url('/logout') }}"
              method="POST" style="display: none;">{{ csrf_field() }}
              </form>

        </div>
      </div>
    </li>
  </ul>
  @endif
</li>
</ul>

<ol id="navegador" class="breadcrumb">
  @yield('nivel1')
  @yield('nivel2')
  @yield('nivel3')
  @yield('nivel4')
</ol>

</div>
