<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">{{Auth::user()->name}}</span>
                                @if(Auth::user()->profile_id == '1')
                                <span class="user-status text-bold-600 role-color">Administrador</span>
                                @elseif(Auth::user()->profile_id == '2')
                                <span class="user-status text-bold-600 role-color">Cliente</span>
                                @elseif(Auth::user()->profile_id == '3')
                                <span class="user-status text-bold-600 role-color">Trabajador</span>
                                @endif
                            </div>

                            <span>
                                <span><img class="rounded-circle" src="{{ asset('images/valdusoft/valdusoft.png') }}" alt="avatar" height="40" width="40"></span>
                            </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('employee.profile') }}"><i class="feather icon-user"></i> Mi
                                perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="feather icon-power"></i> Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>