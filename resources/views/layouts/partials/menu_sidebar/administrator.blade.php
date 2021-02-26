<li class=" nav-item">
    <a href="{{ route('home') }}"><i class="feather icon-home"></i><span class="menu-title"
            data-i18n="Email">Inicio</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('landing.projects') }}"><i class="feather icon-clipboard"></i><span class="menu-title"
            data-i18n="Email">Proyectos</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('landing.customers') }}"><i class="feather icon-users"></i><span class="menu-title"
            data-i18n="Email">Clientes</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('landing.employees') }}"><i class="feather icon-briefcase"></i><span class="menu-title"
            data-i18n="Email">Empleados</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('landing.hosting') }}"><i class="feather icon-hard-drive"></i><span class="menu-title"
            data-i18n="Email">Hosting</span></a>
</li>

<li class="nav-item has-sub"><a href="#"><i class="feather icon-archive"></i><span class="menu-title"
            data-i18n="Ecommerce">Finanzas</span></a>
    <ul class="menu-content" style="">
        <li class=""> <a href="{{ route('landing.payroll') }}"><i class="feather icon-file-text"></i><span
                    class="menu-title" data-i18n="Email">Nomina</span></a>
        </li>

        <li class=""><a href="{{ route('landing.bill') }}"><i class="feather icon-folder"></i><span class="menu-title"
                    data-i18n="Email">Facturas</span></a>
        </li>

        <li class=""><a href="{{ route('landing.payments') }}"><i class="feather icon-dollar-sign"></i><span
                    class="menu-title" data-i18n="Email">Pagos</span></a>
        </li>

    </ul>
</li>
