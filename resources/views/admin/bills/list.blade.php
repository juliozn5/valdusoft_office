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

        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Financiero</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Financiero</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Facturas</a>
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
                        <div class="d-grid gap-2 d-md-block mb-2">
                            <button class="btn btn-primary font-weight-bold">EMPLEADOS</button>
                            <button class="btn btn-white ml-2 font-weight-bold">CLIENTES</button>
                            <button class="btn btn-white ml-2 font-weight-bold">HOSTING</button>

                        </div>
                    </div>

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light text-center">

                                    <tr>
                                        <th>#</th>
                                        <th>NOMBRE</th>
                                        <th>FECHA</th>
                                        <th>MONTO</th>
                                        <th>ESTADO</th>
                                        <th class="col-3">ACCIÓN</th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">




                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th scope="row">#125</th>
                                        <td>Freddy Sanchez</td>
                                        <td>03/09/21</td>

                                        <td>278$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
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
@endsection