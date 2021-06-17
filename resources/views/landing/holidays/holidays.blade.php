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

        <section class="hosting">
        <div class="row" id="table-head">
            <div class="col-8">
                <div class="card">
                    <div class="card-header" style="background-color: white">
                        <h3 class="card-title mb-2">Financiamiento</h3>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-gris">
                                    <tr>
                                        <th>FECHA</th>
                                        <th>DEUDA</th>
                                        <th>ABONO</th>
                                        <th>PEDIENTE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>05 ABR 2021</td>
                                        <td>40$</td>
                                        <td>20$</td>
                                        <td>20$</td>
                                        
                                    </tr>

                                    <tr>
                                        <td>05 ABR 2021</td>
                                        <td>60$</td>
                                        <td>20$</td>
                                        <td>40$</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>05 ABR 2021</td>
                                        <td>80$</td>
                                        <td>20$</td>
                                        <td>60$</td>
                                        
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>05 ABR 2021</td>
                                        <td>100$</td>
                                        <td>20$</td>
                                        <td>80$</td>
                                        
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>05 ABR 2021</td>
                                        <td>120$</td>
                                        <td>20$</td>
                                        <td>100$</td>
                                        
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>05 ABR 2021</td>
                                        <td>140$</td>
                                        <td>20$</td>
                                        <td>120$</td>
                                        
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>05 ABR 2021</td>
                                        <td>160$</td>
                                        <td>20$</td>
                                        <td>140$</td>
                                        
                                    <tr>
                                        <td>05 ABR 2021</td>
                                        <td>180$</td>
                                        <td>20$</td>
                                        <td>160$</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>05 ABR 2021</td>
                                        <td>40$</td>
                                        <td>200$</td>
                                        <td>180$</td>
                                        
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Proximas<br>Vacaciones</h5>
                    <br>
                    <p class="h4 " id="holidays-date"><i class="far fa-calendar icon-big mr-1"></i>30 Agosto</p>
                    <img src="{{asset('/images/svg/ilustracion_clientes.svg')}}" style="position:absolute; margin-left:125px;top:20px; height:100px;" alt="">
                </div>
            </div>
            </div>

            

        <section>
<!-- END: Content-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@endsection