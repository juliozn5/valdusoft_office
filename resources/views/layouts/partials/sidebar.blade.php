<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                @if (Auth()->user()->profile_id == 0)
                <a class="navbar-brand" href="{{ ('home') }}">
                    @elseif (Auth()->user()->profile_id == 1)
                    <a class="navbar-brand" href="{{ route('admin.home') }}">
                        @elseif (Auth()->user()->profile_id == 2)
                        <a class="navbar-brand" href="{{ route('client.home') }}">
                            @elseif (Auth()->user()->profile_id == 3)
                            <a class="navbar-brand" href="{{ route('employee.home') }}">
                                @endif
                                <img class="img-fluid center-block logo-center mb-5" width="200px" height="200px"
                                    src="{{ asset('images/valdusoft/logo.png') }}" />
                            </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @if (Auth()->user()->profile_id == 1)
            @include('layouts.partials.menu_sidebar.administrator')
            @elseif (Auth()->user()->profile_id == 2)
            @include('layouts.partials.menu_sidebar.client')
            @elseif (Auth()->user()->profile_id == 3)
            @include('layouts.partials.menu_sidebar.employee')
            @endif
        </ul>
    </div>
</div>