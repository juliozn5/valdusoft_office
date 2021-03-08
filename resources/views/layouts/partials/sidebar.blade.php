<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="img-fluid center-block logo-center mb-5" width="200px" height="200px"
                        src="{{ asset('images/logo.png') }}" />
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @if (Auth()->user()->role == '1')
            @include('layouts.partials.menu_sidebar.administrator')
            @endif
            @if (Auth()->user()->role == '2')
            @include('layouts.partials.menu_sidebar.client')
            @endif
            @if (Auth()->user()->role == '3')
            @include('layouts.partials.menu_sidebar.employee')
            @endif

        </ul>
    </div>
</div>
