<style>
.icono{
   width: 2rem !important;
   height: 3rem !important;
}

</style>
<li class=" nav-item ">
    <a class="row" href="{{ route('admin.home') }}"><i class="fa fa-home tañao col-2" aria-hidden="true"></i>
        <span class="menu-title col-sm-2 mt-1">Inicio</span></a>
</li>

<li class=" nav-item ">
    <a class="elementoPadre  row" href="{{ route('admin.projects.list') }}"><i class=" col-2 fa fa-briefcase" aria-hidden="true"></i>
        <span class="menu-title col-sm-2 mt-1">Proyectos</span></a>
</li>

<li class=" nav-item ">
    <a class="elementoPadre  row" href="{{ route('admin.clients.list') }}"><i class="col-2 fa fa-users" aria-hidden="true"></i>
        <span class="menu-title col-sm-2 mt-1">Clientes</span></a>
</li>

<li class=" nav-item ">
    <a class="elementoPadre row " href="{{ route('admin.employees.list') }}"><i class=" col-2 fa fa-user" aria-hidden="true"></i>
        <span class="menu-title col-sm-2 mt-1 menuSidebar">Empleados</span> </a>
</li>

<li class=" nav-item ">
    <a class="elementoPadre row " href="{{ route('admin.hostings.list') }}"><i class="col-2 fa fa-server" aria-hidden="true"></i>
        <span class="menu-title col-sm-2 mt-1">Hosting</span></a>
</li>

<li class="nav-item has-sub "><a class="elementoPadre row" href="#"><i class="  col-2 fa fa-credit-card" aria-hidden="true"></i>
    <span class="menu-title col-sm-2 mt-1" data-i18n="Ecommerce">Financiero</span></a>
    <ul>
        <li> <a href="{{ route('admin.bills.list') }}"><i class="fa fa-file-text" aria-hidden="true"></i><span class="menu-title ml-1">Facturas</span></a>
        </li>

        <li> <a href="{{ route('admin.payrolls.list') }}"><i class="fa fa-list-alt" aria-hidden="true"></i><span class="menu-title ml-1">Nómina</span></a>
        </li>

        <li><a href="{{ route('admin.payments.list') }}"><i class="fa fa-money" aria-hidden="true"></i><span class="menu-title ml-1">Pagos</span></a>
        </li>

    </ul>

</li>
