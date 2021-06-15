<li class=" nav-item">
    <a href="{{ route('admin.home') }}"><img src="{{ asset('images/icons/home.png') }}"/>
        <span class="menu-title ml-1" data-i18n="Email">Inicio</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('landing.projects') }}"><img src="{{ asset('images/icons/maletin.png') }}"/>
        <span class="menu-title ml-1" data-i18n="Email">Proyectos</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('clients.home') }}"><img src="{{ asset('images/icons/client.png') }}"/></i>
        <span class="menu-title ml-1" data-i18n="Email">Clientes</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('employes.home') }}"><img src="{{ asset('images/icons/users-line.png') }}"/>
        <span class="menu-title ml-1" data-i18n="Email">Empleados</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('landing.hosting') }}"><img src="{{ asset('images/icons/hosting.png') }}"/>
        <span class="menu-title ml-1" data-i18n="Email">Hosting</span></a>
</li>

<li class="nav-item has-sub"><a href="#"><img src="{{ asset('images/icons/mone.png') }}"/>
        <span class="menu-title ml-1" data-i18n="Ecommerce">Financiero</span></a>

    <ul class="menu-content" style="">

        <li class=""><a href="{{ route('landing.bill') }}"><img src="{{ asset('images/icons/mone.png') }}"/>
                <span class="menu-title ml-1" data-i18n="Email">Financiero-Facturas</span></a>
        </li>
        
        <li class=""> <a href="{{ route('landing.payroll') }}"><img src="{{ asset('images/icons/mone.png') }}"/>
                <span class="menu-title ml-1" data-i18n="Email">Financiero-Nòmina</span></a>
        </li>

        <li class=""><a href="{{ route('landing.payments') }}"><img src="{{ asset('images/icons/mone.png') }}"/>
                </i><span class="menu-title ml-1" data-i18n="Email">Financiero-Pagos</span></a>
        </li>

    </ul>
</li>
