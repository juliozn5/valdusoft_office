<li class=" nav-item">
    <a href="{{ route('admin.home') }}"><img src="{{ asset('images/icons/home.png') }}" />
        <span class="menu-title ml-1">Inicio</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('admin.projects.list') }}"><img src="{{ asset('images/icons/maletin.png') }}" />
        <span class="menu-title ml-1">Proyectos</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('admin.clients.list') }}"><img src="{{ asset('images/icons/client.png') }}" /></i>
        <span class="menu-title ml-1">Clientes</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('admin.employees.list') }}"><img src="{{ asset('images/icons/users-line.png') }}" />
        <span class="menu-title ml-1">Empleados</span></a>
</li>

<li class=" nav-item">
    <a href="{{ route('admin.hostings.list') }}"><img src="{{ asset('images/icons/hosting.png') }}" />
        <span class="menu-title ml-1">Hosting</span></a>
</li>

<li class="nav-item has-sub"><a href="#"><img src="{{ asset('images/icons/mone.png') }}" />
    <span class="menu-title ml-1" data-i18n="Ecommerce">Financiero</span></a>
    <ul>
        <li><a href="{{ route('admin.bills.list') }}"><img src="{{ asset('images/icons/mone.png') }}" /><span class="menu-title ml-1">Financiero-Facturas</span></a>
        </li>

        <li> <a href="{{ route('admin.payrolls.list') }}"><img src="{{ asset('images/icons/mone.png') }}" /><span class="menu-title ml-1">Financiero-Nómina</span></a>
        </li>

        <li><a href="{{ route('admin.payments.list') }}"><img src="{{ asset('images/icons/mone.png') }}" /><span class="menu-title ml-1">Financiero-Pagos</span></a>
        </li>

    </ul> 

</li>
