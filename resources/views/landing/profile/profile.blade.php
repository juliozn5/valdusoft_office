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
        <div class="card container" id="container-big-principal">


            <div class="content-body">

                <div class="row" id="table-head">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">

                                <div class="row" id="all-center-items">

                                    <div class="col-md-4">

                                        <img class="rounded-circle" src="{{ asset('images/Ellipse.png')}}" alt="" width="55px" height="55px">
                                    </div>

                                    <div class="col-md-8">
                                        <h3 class="card-title">Gregorio Zambrano</h3>
                                        gregorio_zambrano@gmail.com

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

                            <!--PROYECTOS ASIGNADOS-->
                            <br><br><br>

                            <!--PROYECTO 1-->
                            <div class="pl-2 pr-2">
                                <div class="project-detail-titles">Proyectos Asignados</div>
                                <div class="mt-1">


                                    <!--PROYECTO 1-->
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-circle" style="background:#FF3F3F;">P1</div>
                                    </div>

                                    <!--PROYECTO 2-->
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-circle" style="background:#12A0B4;">P2</div>
                                    </div>


                                    <!--PROYECTO 3-->
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-circle" style="background:#940385;">P3</div>
                                    </div>
                                </div>
                            </div>

                            <!--SECCION DE FECHAS-->

                            <!--FECHA DE NACIMIENTO-->
                            <div class="row mt-3 pl-2 pr-2">
                                <div class="col-3">
                                    <div class="project-detail-titles">Fecha de Nacimiento</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i>
                                        02/10/1987
                                    </div>
                                </div>

                                <!--FECHA DE INGRESO-->
                                <div class="col-3">
                                    <div class="project-detail-titles">Fecha de Ingreso</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i>
                                        01/02/2021
                                    </div>
                                </div>

                                <!--PROXIMAS VACACIONES-->
                                <div class="col-3">
                                    <div class="project-detail-titles">Próximas Vacaciones</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i>
                                        01/02/2021
                                    </div>
                                </div>
                            </div>

                            <!--SECCION DE SKILLS-->

                            <div class="mt-3 pl-2 pr-2">
                                <div class="project-detail-titles">Skills</div>
                                <div class="mt-1">

                                    <br>

                                    <!--SKILL_1 (PHP)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill">PHP</div>
                                    </div>

                                    <!--SKILL_2 (VUE)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill">Vue</div>
                                    </div>

                                    <!--SKILL_3 (LARAVEL)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill">Laravel</div>
                                    </div>

                                    <!--SKILL_4 (REACT)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill">React</div>
                                    </div>

                                    <!--SKILL_5 (IONIC)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill">Ionic</div>
                                    </div>

                                    <!--SECCION DE CURRICULUM-->

                                    <div class="mt-3 pl-2 pr-2">
                                        <div class="project-detail-titles">Curriculum Vitae</div>
                                        <div class="mt-1">

                                            <img src="{{asset('images/icons/arrow-down.png')}}" alt="">
                                            <div class="col-4 mr-1" id="curiculum-email">CV_Gregorio_Zambrano.pdf</div>
                                        </div>
                                    </div>

                                    <!--SECCION DE SUELDO-->

                                    <div class="row mt-3 pl-2 pr-2">
                                        <div class="col-2">
                                            <div class="project-detail-titles">Precio Por Hora</div>
                                            <div class="mt-1 project-detail-dates">
                                                <img src="{{ asset('images/icons/dollar.png')}}" alt="" class="mr-1">4 USD
                                            </div>
                                        </div>

                                        <!--SECCION DE SUELDO (CUENTA DE UPHOLD)-->
                                        <div class="col-5">
                                            <div class="project-detail-titles">Cuenta Uphold</div>
                                            <div class="mt-1 project-detail-dates">
                                                <img src="{{ asset('images/icons/uphold.png')}}" alt="" class="mr-1"> Gregorio_Zambrano@gmail.com
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

        <strong>Proyectos asignados</strong>
        <div class="margin-pa mt-40">
            <div class="container circulo">
            <h3><a href="#" class="content-circle">P1</a><h3>
            </div>
            <div class="container circulop2">
                <h3><a href="#" class="content-circle">P2</a><h3>
                </div>
                <div class="container circulop3">
                    <h3><a href="#" class="content-circle">P3</a><h3>
                    </div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-white">
                    <tr>
                        <th>Fecha de naciemiento</th>
                        <th>Fecha de ingreso</th>
                        <th>Proximas vacaciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><i class="feather icon-clipboard"></i>02/10/1987</td>
                        <td><i class="feather icon-clipboard"></i>01/02/2021</td>
                        <td><i class="feather icon-clipboard"></i>01/02/2022</td>
                   <tr>
                </tbody>
            </table>
        </div>
        
        <strong>Skills</strong>

        <div class="button-group-area mt-40">
            <a href="#" class="genric-btn skills circle">PHP</a>
            <a href="#" class="genric-btn skills circle">Vue</a>
            <a href="#" class="genric-btn skills circle">Laravel</a>
            <a href="#" class="genric-btn skills circle">React</a>
            <a href="#" class="genric-btn skills circle">lonic</a>
        </div>


        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-white">
                    <tr>
                        <th>Curriculumk Vitae</th>
                    </tr>
                </thead>
    
                <tbody>
                    <tr>
                        <td>CV_gregorio_zambrano.pdf</td>
                   <tr>
                </tbody>
            </table>
        </div>
    
    
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-white">
                    <tr>
                        <th>Precio por hora</th>
                        <th>Cuenta Uphold</th>
                    </tr>
                </thead>
    
                <tbody>
                    <tr>
                        <th>$4 USD</th>
                        <td>gregorio_zambano@gmail.com</td>
                   <tr>
                </tbody>
            </table>
        </div>
        

        </div>
    </div>
    
</div>

@endsection
