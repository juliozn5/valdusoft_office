<li class=" nav-item btn-menu">
    <a href="{{ route('employes.home') }}"><img src="{{ asset('images/icons/home.png') }}" />
        <span class="menu-title ml-1" data-i18n="Email">Inicio</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('projects') }}"><img src="{{ asset('images/icons/maletin.png') }}" />
        <span class="menu-title ml-1" data-i18n="Email">Proyectos</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('bill') }}"><img src="{{ asset('images/icons/mone.png') }}" />
        <span class="menu-title ml-1" data-i18n="Email">Facturas</span></a>
</li>

<li class="nav-item has-sub"><a href="#"><img src="{{ asset('images/icons/group_157.png') }}" />
        <span class="menu-title ml-1" data-i18n="Ecommerce">De interes</span></a>

    <ul>

        <li><a href="{{ route('holidays') }}"><span class="menu-title ml-1">Vacaciones</span></a>
        </li>

        <li><a href="{{ route('financing') }}"><span class="menu-title ml-1">Financiamiento</span></a>
        </li>

        <li><a href="{{ route('bonds') }}"><span class="menu-title ml-1">Bonos</span></a>
        </li>


    </ul>
</li>

<li class=" nav-item">
    <a href="{{ route('profile') }}"><img src="{{ asset('images/icons/perfil.png') }}" />
        <span class="menu-title ml-1" data-i18n="Email">Perfil</span></a>
</li>
