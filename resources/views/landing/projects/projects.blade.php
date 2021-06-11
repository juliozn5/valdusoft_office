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
                        <h2 class="content-header-title float-left mb-0">Proyectos</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('landing.projects') }}">Proyectos</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="content-body">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card" style="height: 897px;">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Tabla de Proyectos</h3>
                            <a href="{{ route('landing.projects-create') }}" class="btn btn-primary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; Añadir Proyecto</a>
                        </div>

                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light ">
                                        <tr>
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
                                    <div class="project-detail-skill" style="background: #3C3232;border-radius:10px;">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        
                        <tr>
                            <th scope="row">125966548</th>
                            <td>lorem ipsu dolor</td>
                            <td>01/01/2021</td>
                            <td>01/04/2021</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" style="background: #3C3232;border-radius:10px;">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                            <th scope="row">125966548</th>
                            <td>lorem ipsu dolor</td>
                            <td>01/01/2021</td>
                            <td>01/04/2021</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" style="background: #3C3232; border-radius:10px;">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">125966548</th>
                            <td>lorem ipsu dolor</td>
                            <td>01/01/2021</td>
                            <td>01/04/2021</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" style="background: #3C3232; border-radius:10px;">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">125966548</th>
                            <td>lorem ipsu dolor</td>
                            <td>01/01/2021</td>
                            <td>01/04/2021</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" style="background:#3C3232; border-radius:10px;">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">125966548</th>
                            <td>lorem ipsu dolor</td>
                            <td>01/01/2021</td>
                            <td>01/04/2021</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" style="background: #3C3232; border-radius:10px;">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">125966548</th>
                            <td>lorem ipsu dolor</td>
                            <td>01/01/2021</td>
                            <td>01/04/2021</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" style="background: #3C3232; border-radius:10px;">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        <tr>
                            <th scope="row">125966548</th>
                            <td>lorem ipsu dolor</td>
                            <td>01/01/2021</td>
                            <td>01/04/2021</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" style="background: #3C3232; border-radius:10px;">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>
                        <tr>
                            <th scope="row">125966548</th>
                            <td>lorem ipsu dolor</td>
                            <td>01/01/2021</td>
                            <td>01/04/2021</td>
                            <td>
                                <div class="text-center text-white d-inline-block mr-2">
                                    <div class="project-detail-skill" style="background: #3C3232; border-radius:10px;">En Proceso</div>
                            </td>
                            <td><img src="{{asset('images/Vector.png')}}" alt=""></td>
                        </tr>

                    </tbody>
                </table>

                <div class="card-body" style="padding: 0px 0px !important;">




                    <div class="pl-2 pr-3 float-right">
                        <div class="mt-1">

                            <div class="text-center text-white d-inline-block mr-1">
                                <div class="project-circle" style="background:#EBEBEB;color:#000;"><i class="fas fa-angle-left"></i></div>
                            </div>


                            <div class="text-center d-inline-block">
                                <div class="project-circle" style="background:#650865;">
                                    <h5 class="text-white">1</h5>
                                </div>
                            </div>

                            <div class="text-center d-inline-block mr-1">
                                <div class="project-circle" style="background:#EBEBEB; color:#000;">
                                    <h5 class="">2</h5>
                                </div>
                            </div>


                            <div class="text-center text-white d-inline-block mr-1">
                                <div class="project-circle" style="background:#EBEBEB;color:#000;"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>



                                    <table>
                                    <tbody>

                                        @foreach ($projects as $item)
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('landing.projects-edit', $item->id) }}" class="btn btn-sm btn-primary mb-1"><i class="feather icon-edit"></i>Editar</a>
                                                <form action="{{ route('landing.projects-delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="feather icon-trash"></i>Eliminar</button>
                                                </form>
                                            </td>
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
    </div>


</div>
</div>
@endsection