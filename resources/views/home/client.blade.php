@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

            <div class="card pl-1">
                <div class="card-header">
                    <h3 class="card-title mb-2">Proyectos</h3>
                    <div class="container pb-2">
                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3" style="margin-right: 90px;">
                            <div class="col shadow  rounded" style="right:20px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2  text-white" id="shadow">Recomiendo
                                </div>
                            </div>
                            <div class="col shadow  rounded" style="left:15px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">Recomiendo
                                </div>
                            </div>

                            <div class="col shadow  rounded" style="left:45px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">Recomiendo
                                </div>
                            </div>
                            <div class="col shadow  rounded" style="left:80px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">Recomiendo
                                </div>
                            </div>

                            <div class="col shadow  rounded" style="left:108px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">Recomiendo
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card pl-1">
                <div class="card-header">
                    <h3 class="card-title mb-2">Facturas</h3>
                    <div class="table-responsive pt-2">
                        <table class="table">
                            <thead class="thead-light">
                                <th>FECHA</th>
                                <th>DESCRIPCIÓN</th>
                                <th>MONTO</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>05 May 2021</td>
                                    <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                    <td>640$</td>
                                </tr>
                                <tr>
                                    <td>05 May 2021</td>
                                    <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                    <td>640$</td>
                                </tr>
                                <tr>
                                    <td>05 May 2021</td>
                                    <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                    <td>640$</td>
                                </tr>
                                <tr>
                                    <td>05 May 2021</td>
                                    <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                    <td>640$</td>
                                </tr>
                                <tr>
                                    <td>05 May 2021</td>
                                    <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                    <td>640$</td>
                                </tr>
                                <tr>
                                    <td>05 May 2021</td>
                                    <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                    <td>640$</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="content-body">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-2">Hosting</h3>
                        <div class="container pb-2">
                            <div class="row ">
                                <div class="card-body rounded " style="background: #252856;">
                                    <img class="float-right" src="{{asset('images/background.png')}}" alt="">
                                    <h5 class="card-title text-white">Recomiendo.com</h5>
                                    <br>
                                    <p class="card-text h6 text-white">Fecha de renovación</p>
                                    <br>
                                    <p class="h4 text-white"><i class="far fa-calendar icon-big mr-1"></i>02/10/2021</p>
                                </div>
                                <div class="card-body rounded ml-1" style="background: #252856;">
                                    <img class="float-right" src="{{asset('images/background.png')}}" alt="">
                                    <h5 class="card-title text-white">Recomiendo.com</h5>
                                    <br>
                                    <p class="card-text h6 text-white">Fecha de renovación</p>
                                    <br>
                                    <p class="h4 text-white"><i class="far fa-calendar icon-big mr-1"></i>02/10/2021</p>
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