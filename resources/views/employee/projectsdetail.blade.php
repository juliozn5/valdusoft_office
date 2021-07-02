@extends('layouts.app')

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">Proyectos</div>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Proyectos</a></li>
                                <li class="breadcrumb-item">Detalle del Proyecto</li>

                            </ol>

                            <div class=" d-md-flex justify-content-md-end ">
                                <a href="{{route('employee.projects.list')}}" style="left:240px;" class="btn me-md-2 text-dark">Atrás</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="row">

                <!-- Sección Izquierda -->
                <div class="col-6">

                    <div class="card rounded">
                        <div style="height: 300px;">
                            <img src="{{asset('images/figma/big.png')}}" width="100%" height="100%">

                        </div>

                        <div class="p-2">
                            <h3 class="card-title">Proyecto #1</h3>

                            <!-- Sección de Cliente -->
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="project-detail-titles">Cliente</div>
                                    <div class="mt-1 project-detail-dates">
                                        Cliente Pedro Perez
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="project-detail-titles">País</div>
                                    <div class="mt-1 project-detail-dates">
                                        <img src="{{asset('images/figma/Colombia.png')}}" alt="">
                                        Colombia
                                    </div>
                                </div>
                            </div>

                            <!-- Sección de Miembros-->
                            <div class="row mt-2">
                                <div class="col-12 pb-1">
                                    <div class="project-detail-titles">Miembros</div>
                                </div>

                                <div class="col-1 mr-1">
                                    <img class="rounded-circle" src="{{asset('images/figma/Ellipse_2.png')}}" alt="#" height="50" width="50">
                                </div>

                                <div class="col-1 mr-1 ml-1">
                                    <img class="rounded-circle" src="{{asset('images/figma/Ellipse_3.png')}}" alt="#" height="50" width="50">
                                </div>

                                <div class="col-1 mr-1 ml-1">
                                    <img class="rounded-circle" src="{{asset('images/figma/Ellipse_4.png')}}" alt="#" height="50" width="50">
                                </div>

                            </div>
                            <!-- Sección de Fechas -->
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="project-detail-titles">Fecha de Inicio</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i>
                                        Lunes 14 de Enero
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="project-detail-titles">Fecha de Entrega</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big "></i> Viernes 28 de Febrero
                                    </div>
                                </div>
                            </div>

                            <!-- Sección de Tecnologías -->
                            <div class="mt-2">
                                <div class="project-detail-titles">Tecnologías</div>
                                <div class="mt-1">

                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-detail-skill">PHP</div>
                                    </div>

                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-detail-skill">Vue</div>
                                    </div>

                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-detail-skill">Laravel</div>
                                    </div>

                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-detail-skill">React</div>
                                    </div>

                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-detail-skill">Ionic</div>
                                    </div>

                                </div>
                            </div>

                            <!-- Sección de Status -->
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="project-detail-titles">Estado</div>
                                    <div class="mt-1 project-detail-dates">
                                        <label class="label status-label status-label-gray h6">En Proceso</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Sección Derecha -->
                <div class="col-6">
                    <div class="card">
                        <div class="pt-2 pl-2 pr-2 pb-0">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link nav-link-pills active" data-toggle="tab" href="#attachments">Adjuntos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-pills" data-toggle="tab" href="#chat">Chat</a>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-content">
                            <!-- Pestaña de Adjuntos -->
                            <div class="tab-pane  active  pl-2 pr-2 pt-1" id="attachments">
                                <h3 class="card-title">Adjuntos</h3>

                                <div class="row mt-1 mb-2">

                                    <div class="col-4 pt-1">

                                        <a href="#" target="_blank">
                                            <img src="{{asset('images/figma/lg.png')}}" width="100%" height="100px">
                                        </a>

                                    </div>
                                    <div class="col-8 pt-1">
                                        <div style="font-size: 12px; font-weight: 500; color: #3C3232;"></div>

                                        <div class="mt-2" style="font-size: 12px; font-weight: 300; color: #9D9EAF;">
                                            Añadido: 2 de enero de 2021 a las 18:47<br>
                                            <br>
                                            <a href="#">Eliminar</a> - <a href="#"">Editar</a>
                                                </div>
                                            </div>

                                </div>

                                <div>
                                    <a href=" #newAttachment" data-toggle="modal" class="btn btn-info mb-2 waves-effect waves-light"> Añadir un adjunto</a>
                                        </div>
                                    </div>

                                    <!-- Pestaña del Chat-->
                                    <div class="tab-pane fade pl-2 pr-2" id="chat">
                                        <h3 class="card-title">Chat</h3>



                                    </div>
                                    @endsection