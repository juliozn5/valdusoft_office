@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')



<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="table-responsive pt-4" id="contenedor">

                <h1 class="h-a">Financiamiento</h1>
                <br>
                <table class="table" style="color: black; font-weight:500;">

                    <thead class="thead-light">
                        <th>FECHA</th>
                        <th>DEUDA</th>
                        <th>ABONO</th>
                        <th>PENDIENTE</th>
                    </thead>
                    <tbody>
                        <tr style="width:150px;">
                            <td>05 Abr 2021</td>
                            <td>40$</td>
                            <td>20$</td>
                            <td>20$</td>
                        </tr>
                        <tr>
                            <td>05 Mar 2021</td>
                            <td>60$</td>
                            <td>20$</td>
                            <td>40$</td>
                        </tr>
                        <tr>
                            <td>05 Feb 2021</td>
                            <td>80$</td>
                            <td>20$</td>
                            <td>60$</td>
                        </tr>
                        <tr>
                            <td>05 Enen 2021</td>
                            <td>100$</td>
                            <td>20$</td>
                            <td>80$</td>
                        </tr>
                        <tr>
                            <td>05 Dic 2021</td>
                            <td>120$</td>
                            <td>20$</td>
                            <td>100$</td>
                        </tr>
                        <tr>
                            <td>05 Nov 2021</td>
                            <td>140$</td>
                            <td>20$</td>
                            <td>120$</td>
                        </tr>
                        <tr>
                            <td>05 Oct 2021</td>
                            <td>160$</td>
                            <td>20$</td>
                            <td>140$</td>
                        </tr>
                        <tr>
                            <td>05 Sep 2021</td>
                            <td>180$</td>
                            <td>20$</td>
                            <td>160$</td>
                        </tr>
                        <tr>
                            <td>05 Ago 2021</td>
                            <td>200$</td>
                            <td>200$</td>
                            <td>180$</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>




</div>
</div>
</div>

<div class="small">
    <p class="Vacaciones">Próximas Vacaciones</p>
    <h4 class="Fecha"><i class="far fa-calendar"></i> 30 Agosto</h4>
    <img class="Svg" src="{{ asset('images/ilustracion_clientes.svg') }}" alt="Help">
</div>

<style>
    #contenedor {
        position: absolute;
        width: 681.81px;
        height: 600.05px;
        left: 35.98px;
        top: 133.7px;
        background: #FFFFFF;
        box-shadow: 0px 0px 20px rgba(177, 177, 177, 0.25);
        border-radius: 10px;
    }

    .h-a {

        position: absolute;
        width: 122.99px;
        left: 18px;
        top: 15.06px;
        font-style: normal;
        font-weight: 850;
        font-size: 18px;
        line-height: 22px;
        color: #3C3232;

    }

    .small {
        position: absolute;
        width: 326.4px;
        height: 160.64px;
        left: 1050.6px;
        top: 133px;
        background: #FFFFFF;
        box-shadow: 0px 0px 20px rgba(177, 177, 177, 0.25);
        border-radius: 5px;
    }

    .Vacaciones {
        position: absolute;
        width: 90px;
        height: 46px;
        top: 28.83px;
        left: 25px;
        font-style: normal;
        font-weight: 850;
        font-size: 16px;
        line-height: 25px;
        color: #3C3232;

    }

    .Fecha {
        position: absolute;
        height: 23px;
        top: 110px;
        font-style: normal;
        font-weight: 850;
        line-height: 22px;
        color: #650865;
        left: 28px;
    }

    .Svg {
        height: 130px;
        position: absolute;
        left: 55.91%;
        right: 2.09%;
        top: 12.25%;
        bottom: 77.2%;

    }
</style>



<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-dark">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="https://valdusoft.com" target="_blank">Valdusoft,</a>All rights Reserved</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->
@endsection