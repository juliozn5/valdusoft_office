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
        <div class="card container-sm">
            <div class="content-body jutify-content">


                <div id="table-head">
                    <div class="">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-1">Facturacion</h3>

                            </div>

                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table mb-0">
                                        <thead class="thead-gris">
                                            <tr>
                                                <th># <i class="fas fa-sort"></i></th>
                                                <th>FECHA <i class="fas fa-sort"></i></th>
                                                <th>MONTO <i class="fas fa-sort"></i></th>
                                                <th>ESTADO</th>
                                                <th>ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">#125</th>
                                                <td>05 Sep</td>
                                                <td>20.36$</td>
                                                <td>
                                                    <div class="text-center text-white d-inline-block mr-2">
                                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                                </td>
                                                <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">#126</th>
                                                <td>05 Sep</td>
                                                <td>20.36$</td>
                                                <td>
                                                    <div class="text-center text-white d-inline-block mr-2">
                                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                                </td>
                                                <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#127</th>
                                                <td>05 Sep</td>
                                                <td>20.36$</td>
                                                <td>
                                                    <div class="text-center text-white d-inline-block mr-2">
                                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                                </td>
                                                <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                            </tr>

                                            <tr>
                                            <tr>
                                                <th scope="row">#128</th>
                                                <td>05 Sep</td>
                                                <td>20.36$</td>
                                                <td>
                                                    <div class="text-center text-white d-inline-block mr-2">
                                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                                </td>
                                                <td><a href=""><img id="bottom" src="{{ asset('images/icons/Vector.png')}}" alt=""></a></td>
                                            </tr>

                                            <tr>
                                            <tr>
                                                <th scope="row">#129</th>
                                                <td>05 Sep</td>
                                                <td>20.36$</td>
                                                <td>
                                                    <div class="text-center text-white d-inline-block mr-2">
                                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                                </td>
                                                <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                            </tr>

                                            <tr>
                                            <tr>
                                                <th scope="row">#130</th>
                                                <td>05 Sep</td>
                                                <td>20.36$</td>
                                                <td>
                                                    <div class="text-center text-white d-inline-block mr-2">
                                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                                </td>
                                                <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                            </tr>

                                            <tr>
                                            <tr>
                                                <th scope="row">#131</th>
                                                <td>05 Sep</td>
                                                <td>20.36$</td>
                                                <td>
                                                    <div class="text-center text-white d-inline-block mr-2">
                                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                                </td>
                                                <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                            <tr>
                                                <th scope="row">#132</th>
                                                <td>05 Sep</td>
                                                <td>20.36$</td>
                                                <td>
                                                    <div class="text-center text-white d-inline-block mr-2">
                                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                                </td>
                                                <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">#133</th>
                                                <td>05 Sep</td>
                                                <td>20.36$</td>
                                                <td>
                                                    <div class="text-center text-white d-inline-block mr-2">
                                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                                </td>
                                                <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <div class="bottom float-right" style="margin-right:20px;">

                                        <button class="btn  btn-circle btn-lg "><i style="color:black;" class="fas fa-angle-left"></i>

                                        </button>

                                        <button class="btn btn-primary  btn-circle btn-lg">1

                                        </button>

                                        <button style="color:black;" class="btn btn-circle btn-lg">2

                                        </button>

                                        <button class="btn  btn-circle btn-lg "><i style="color:black;" class="fas fa-angle-right"></i>


                                        </button>

                                    </div>   
                                    <br><br>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!--END: Content

                <div class="sidenav-overlay"></div>
                <div class="drag-target"></div>
-->
                <!-- BEGIN: Footer
                
                <footer class="footer footer-static footer-dark">
                    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="https://valdusoft.com" target="_blank">Valdusoft,</a>All rights Reserved</span>
                        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
                    </p>
                </footer>-->
                <!-- END: Footer-->
                @endsection