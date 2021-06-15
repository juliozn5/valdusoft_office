@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        
        <div class="card-holi content-body">
        
            <div class="table-responsive">
                <table class="table mb-0">

                    <div class="card content-header row">

                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                    <h2 class="content-header-title float-left mb-0 mt-1 ml-2"><strong>Finannciamiento</strong></h2>
                                    <div class="breadcrumb-wrapper col-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>

                    <thead class="thead-gris">
                        <tr>
                            <th>FECHA</th>
                            <th>DEUDA</th>
                            <th>ABONO</th>
                            <th>PENDIENTE</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>05 Abr 2021</td>
                            <td>40$</td>
                            <td>20$</td>
                            <td>20$</td>
                       <tr>
                    </tbody>
                </table>
            </div>
        
        
        </div>


        <div class="card-cloud mt-2 ml-1">
            <div class="container-fluid col-3 ml-1">
                  <img class="img-view3" src="{{ asset('images/ilustracion_clientes.svg') }}" alt="">
                      <h4 class="text-mic">Proximas <br> Vacaciones</h4><br>
                      <h4 class="text-chel"><i class="feather icon-clipboard"></i>30 Agosto</h4>
          </div>
          </div>





    </div>
</div>

        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-light">
            <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="https://valdusoft.com" target="_blank">Valdusoft,</a>All rights Reserved</span>
                <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
            </p>
        </footer>
        <!-- END: Footer-->
@endsection