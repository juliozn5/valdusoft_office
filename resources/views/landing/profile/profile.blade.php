@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="card container">

            <div class="content-body">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">

                                <div class="" id="">

                                    <div class="">

                                        <img class="rounded-circle ml-2" src="{{ asset('images/user/Ellipse.png')}}" alt="" width="55px" height="55px">
                                    </div>

                                </div>

                                <div class="col ml-1">
                                    <h3 class="card-title mb-1">Gregorio Zambrano</h3>
                                    gregorio_zambrano@gmail.com

                                </div>

                            </div>

                        </div>


                        <div class="card-body">

                            <!--ASSIGNED PROJECTS-->

                            <!--PROJECT 1-->
                            <div class="pl-2 pr-2">
                                <div class="project-detail-titles">Proyectos Asignados</div>
                                <div class="mt-1">


                                    <!--PROJECT 1-->
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-circle" style="background:#FF3F3F;">P1</div>
                                    </div>

                                    <!--PROJECT 2-->
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-circle" style="background:#12A0B4;">P2</div>
                                    </div>


                                    <!--PROJECT 3-->
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-circle" style="background:#940385;">P3</div>
                                    </div>
                                </div>
                            </div>

                            <!--DATE SECTION-->

                            <!--DATE OF BIRTH-->
                            <div class="row mt-3 pl-2 pr-2">
                                <div class="col-md-3 col-sm-1">
                                    <div class="project-detail-titles">Fecha de Nacimiento</div>
                                    <div class="mt-1 project-detail-dates">
                                        <img class="rounded-circle" src="{{ asset('images/svg/calendar.svg')}}">
                                        02/10/1987
                                    </div>
                                </div>

                                <!--DATE OF ADMISSION-->
                                <div class="col-md-3 col-sm-1">
                                    <div class="project-detail-titles">Fecha de Ingreso</div>
                                    <div class="mt-1 project-detail-dates">
                                        <img class="rounded-circle" src="{{ asset('images/svg/calendar.svg')}}">
                                        01/02/2021
                                    </div>
                                </div>

                                <!--NEXT VACATIONS-->
                                <div class="col-md-3 col-sm-1">
                                    <div class="project-detail-titles">Próximas Vacaciones</div>
                                    <div class="mt-1 project-detail-dates">
                                        <img class="rounded-circle" src="{{ asset('images/svg/calendar.svg')}}">
                                        01/02/2021
                                    </div>
                                </div>
                            </div>

                            <!--SKILLS SECTION-->

                            <div class="mt-3 pl-2 pr-2">
                                <div class="project-detail-titles">Skills</div>
                                <div class="mt-1">



                                    <!--SKILL_1 (PHP)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="p-2 mb-2 bg-primary text-white rounded-pill">PHP</div>
                                    </div>

                                    <!--SKILL_2 (VUE)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="p-2 mb-2 bg-primary text-white rounded-pill">Vue</div>
                                    </div>

                                    <!--SKILL_3 (LARAVEL)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="p-2 mb-2 bg-primary text-white rounded-pill">LARAVEL</div>
                                    </div>

                                    <!--SKILL_4 (REACT)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="p-2 mb-2 bg-primary text-white rounded-pill">REACT</div>
                                    </div>

                                    <!--SKILL_5 (IONIC)-->
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="p-2 mb-2 bg-primary text-white rounded-pill">IONIC</div>
                                    </div>


                                    <div class="mt-3">
                                        <div class="project-detail-titles">Curriculum Vitae</div>

                                        <div class="mt-1">


                                            <div class="col-md-4 ml-2 position-absolute">CV_Gregorio_Zambrano.pdf</div>
                                        </div>

                                        <a href="#"><img class="mb-4" src="{{asset('images/icons/arrow-down.png')}}" alt=""></a>

                                    </div>



                                    <div class="row">
                                        <div class="col-md-3 col-sm-1">
                                            <div class="project-detail-titles">Precio Por Hora</div>
                                            <div class="mt-1 project-detail-dates">
                                                <img src="{{ asset('images/icons/dollar.png')}}" alt="" class="mr-1">4 USD
                                            </div>
                                        </div>

                                        <div class="col-md-5 col-sm-1">
                                            <div class="project-detail-titles">Billetera USDT Red tron</div>
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
    </div>


@endsection