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
          
            @if (Auth()->user()->role == 'administrator')
            @include('layouts.partials.menu_sidebar.administrator')
            @endif
            @if (Auth()->user()->role == 'client')
            @include('layouts.partials.menu_sidebar.client')
            @endif
            @if (Auth()->user()->role == 'employee')
            @include('layouts.partials.menu_sidebar.employee')
            @endif

        </ul>
    </div>
</div>
