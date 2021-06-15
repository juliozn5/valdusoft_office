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
        <div class="content-header row"></div>
        <div class="card container-sm position-absolute" id="container-card-principal">

            <p class="h4 pl-2 mt-1 container-fluid">Financiamiento</p>


            <div class="card table-responsive pt-2 container-fluid" >
                <table class="table">
                    <thead class="thead-light text-center">
                        <th>FECHA</th>
                        <th>DEUDA</th>
                        <th>ABONO</th>
                        <th>PENDIENTE</th>
                    </thead>
                    <tbody class="h6 text-center">
                    <tr>
                            <td >05 Abr 2021</td>
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
                            <td>05 Ene 2021</td>
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
                            <td>20$</td>
                            <td>180$</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card position-absolute container-fluid ml-2" id="container-card-small">
        
        <p class="h4 p-2 position-absolute">Proximas<br>vacaciones</p>

        <p class="h4 position-absolute" id="holidays-date"><i class="far fa-calendar icon-big mr-1"></i>30 Agosto</p>

        <img class="col-6 position-absolute" id="font-client" src="{{ asset('images/ilustracion_clientes.svg')}}" alt="">

        <div>
    </div>
</div>
</div>
</div>




<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<footer class="footer footer-static footer-dark">
    <p class=" clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="https://valdusoft.com" target="_blank">Valdusoft,</a>All rights Reserved</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->
@endsection