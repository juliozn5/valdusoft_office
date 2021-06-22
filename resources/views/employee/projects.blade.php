@extends('layouts.app')

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-body">
    
            <div id="table-head">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-1">Proyectos</h3>
                        </div>

                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-gris">
                                        <tr class="">
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>FECHA DE ENTREGA</th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><a href="{{route('employee.projects.detail')}}"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><a href=""><img id="bottom" src="{{ asset('images/icons/Vector.png')}}" alt=""></a></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
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

                                <br><br> </table>
                                <br>

                                <table>
                                    <tbody>

                                        @foreach ($projects as $item)
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->status }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endsection