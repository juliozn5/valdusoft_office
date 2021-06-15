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
        <div class="content-header row"> </div>
        <div class="card container-sm  " id="big-container-card">
            <div class="content-body jutify-content">

                <h4 class="p-1 ">Facturación</h4>
                <br>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th class="col-3">FECHA</th>
                            <th scope="col">MONTO</th>
                            <th class="col-4">ESTADO</th>
                            <th scope="col">ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">#125</th>
                            <td>05 Sep</td>
                            <td>20.36$</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" id="background-of-progress">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                            <th scope="row">#126</th>
                            <td>05 Sep</td>
                            <td>20.36$</td>
                            <td>

                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" id="background-of-progress">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                            <th scope="row">#127</th>
                            <td>05 Sep</td>
                            <td>20.36$</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" id="background-of-progress">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">#128</th>
                            <td>05 Sep</td>
                            <td>20.36$</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" id="background-of-progress">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">#129</th>
                            <td>05 Sep</td>
                            <td>20.36$</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" id="background-of-progress">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">#130</th>
                            <td>05 Sep</td>
                            <td>20.36$</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" id="background-of-progress">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">#131</th>
                            <td>05 Sep</td>
                            <td>20.36$</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" id="background-of-progress">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        <tr>
                            <th scope="row">#132</th>
                            <td>05 Sep</td>
                            <td>20.36$</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" id="background-of-progress">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                            <th scope="row">#133</th>
                            <td>05 Sep</td>
                            <td>20.36$</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" id="background-of-progress">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>

                    </tbody>
                </table>

                <div class="card-body" id="card-of-body">




                    <div class="pl-2 pr-3 float-right">
                        <div class="mt-1">

                            <div class="text-center text-white d-inline-block mr-1">
                                <div class="project-circle" id="div-bottom"><i class="fas fa-angle-left"></i></div>
                            </div>


                            <div class="text-center d-inline-block">
                                <div class="project-circle" id="div-bottom-2">
                                    <h5 class="text-white">1</h5>
                                </div>
                            </div>

                            <div class="text-center d-inline-block mr-1">
                                <div class="project-circle" id="div-bottom" >
                                <h5>2</h5>
                                </div>
                            </div>


                            <div class="text-center text-white d-inline-block mr-1">
                                <div class="project-circle" id="div-bottom"><i class="fas fa-angle-right"></i></div>
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