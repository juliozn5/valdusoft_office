@extends('layouts.app')

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-body">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <div class="card content-header row">

                                        <div class="content-header-left col-md-9 col-12 mb-2">
                                            <div class="row breadcrumbs-top">
                                                <div class="col-12">
                                                    <h2 class="content-header-title float-left mb-0 mt-1 ml-2"><strong>Proyectos</strong></h2>
                                                    <div class="breadcrumb-wrapper col-12">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                    </div>
                                    <thead class="thead-gris">
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
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""></td>
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
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""></td>
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
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""></td>
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
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""></td>
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
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""></td>
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
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""></td>
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
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""></td>
                                        <tr>
                                            <th scope="row">125966548</th>
                                            <td>lorem ipsu dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En Proceso</div>
                                            </td>
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""></td>
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
                                            <td><img src="{{asset('images/icons/Vector.png')}}" alt=""></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="card-body" id="div-bottom-project">




                                    <div class="pl-2 pr-3 float-right">
                                        <div class="mt-1">

                                            <div class="text-center text-white d-inline-block mr-1">
                                                <div class="project-circle" id="div-bottom-background"><i class="fas fa-angle-left"></i></div>
                                            </div>


                                            <div class="text-center d-inline-block">
                                                <div class="project-circle" id="div-bottom-background2">
                                                    <h5 class="text-white">1</h5>
                                                </div>
                                            </div>

                                            <div class="text-center d-inline-block mr-1">
                                                <div class="project-circle" id="div-bottom-background">
                                                    <h5>2</h5>
                                                </div>
                                            </div>


                                            <div class="text-center text-white d-inline-block mr-1">
                                                <div class="project-circle" id="div-bottom-background"><i class="fas fa-angle-right"></i></div>
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
                                                    <a href="{{ route('projects-edit', $item->id) }}" class="btn btn-sm btn-primary mb-1"><i class="feather icon-edit"></i>Editar</a>
                                                    <form action="{{ route('projects-delete', $item->id) }}" method="POST">
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