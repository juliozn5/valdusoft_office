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
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">nominas</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Financiero</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Nómina</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">

        <div id="table-head">
            <div class="col-11" style="margin-left:50px">
                <div class="card" id="card-head1">
                    <div class="card-header">
                        <h3 class="card-title mb-1">Listado de las nominas</h3>
                        <a href="{{ route('projects-create') }}" class="btn btn-primary mb-2 waves-effect waves-light">&nbsp; GENERAR</a>
                    </div>

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light ">

                                    <tr>
                                        <th>ID</th>
                                        <th>FECHA</th>
                                        <th>ESTADO</th>
                                        <th>MONTO</th>
                                        <th class="col-2">ACCIÓN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">59</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href="#"><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row">57</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">26</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">87</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">65</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">98</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">38</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">47</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">75</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row">32</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">15</th>
                                        <td>03/09/21</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>
                                        <td>278$</td>

                                        <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>

                                            <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                            <br>

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

                            <br><br><br>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- END: Content

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