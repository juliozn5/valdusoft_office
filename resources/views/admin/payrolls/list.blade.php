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
                    <h2 class="content-header-title float-left mb-0">Nóminas</h2>
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
            <div class="col-11" style="margin-left:15px">
                <div class="card" id="card-head1">
                    <div class="card-header">
                        <h3 class="card-title mb-1">Listado de las nominas</h3>
                        <a href="#" class="btn btn-primary mb-2 waves-effect waves-light">&nbsp; GENERAR</a>
                    </div>

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light ">

                                    <tr>
                                        <th>ID</th>
                                        <th>FECHA</th>
                                        <th>MONTO</th>
                                        <th>ESTADO</th>
                                        <th class="col-2">ACCIÓN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td scope="row">57</td>
                                        <td>03/09/21</td>
                                      
                                        <td>20.36$</td>
                                        <td>
                                            <div class="text-center text-white d-inline-block mr-2">
                                                <div class="project-detail-skill" id="process-project">En Proceso</div>
                                        </td>

                                        <td><a href="#"><i href="#" style="font-size:15px;" class="far fa-eye"></i></a>
                                        <a href="#"><i href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
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