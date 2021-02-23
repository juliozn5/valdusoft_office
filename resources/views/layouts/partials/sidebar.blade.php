<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Valdusoft</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a href="{{ route('home') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Email">Inicio</span></a>
            </li>
        </ul>

     
                @if (Auth()->user()->role == 'administrator')
                    @include('layouts.partials.menu_navbar.administrator')
                @endif
                @if (Auth()->user()->role == 'pago')
                    @include('layouts.partials.menu_navbar.pago')
                @endif
                @if (Auth()->user()->role == 'gold parthner')
                    @include('layouts.partials.menu_navbar.gold parthner')
                @endif
                @if (Auth()->user()->role == 'cm')
                    @include('layouts.partials.menu_navbar.cm')
                @endif
    </div>
</div>