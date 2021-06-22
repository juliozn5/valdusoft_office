@extends('layouts.app')

@section('content')
    @if (Session::has('msj-exitoso'))
        <script>
            $(document).ready(function(){
                toastr.success('La asignación se ha realizado con éxito.', 'Operación Completada');
            });
        </script>
    @endif
    
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.projects.list') }}">Proyectos</a></li>
                                    <li class="breadcrumb-item">Detalle del Proyecto</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row" id="table-head">
                    <div class="col-6">
                        <div class="card">
                            <div style="height: 300px;">
                                <img src="{{ asset('uploads/images/projects/'.$project->logo) }}" width="100%" height="100%">
                            </div>

                            <div class="p-2">
                                <h3 class="card-title">{{ $project->name }}</h3>
                                
                                {{-- Sección de Cliente --}}
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="project-detail-titles">Cliente</div>
                                        <div class="mt-1 project-detail-dates">
                                        {{ $project->user->name }} {{ $project->user->last_name }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="project-detail-titles">País</div>
                                        <div class="mt-1 project-detail-dates">
                                            {{ $project->country->name }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Sección de Miembros--}}
                                <div class="row mt-2">
                                    <div class="col-12 pb-1">
                                        <div class="project-detail-titles">Miembros</div>
                                    </div>
                                    @foreach ($project->employees as $employee)
                                        <div class="col-1 mr-1">
                                            <img class="rounded-circle" src="{{ asset('/uploads/images/users/photos/'.$employee->photo) }}" alt="{{ $employee->fullname }}" height="50" width="50">
                                        </div>
                                    @endforeach
                                    <div class="col-1">
                                        <a href="#availableEmployees" data-toggle="modal">
                                            <img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Miembro" height="50" width="50">
                                        </a>
                                    </div>
                                </div>

                                {{-- Sección de Fechas --}}
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="project-detail-titles">Fecha de Inicio</div>
                                        <div class="mt-1 project-detail-dates">
                                            <i class="far fa-calendar icon-big mr-1"></i> {{ (is_null($project->start_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($project->start_date)) }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="project-detail-titles">Fecha de Entrega</div>
                                        <div class="mt-1 project-detail-dates">
                                            <i class="far fa-calendar icon-big mr-1"></i> {{ (is_null($project->ending_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($project->ending_date)) }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Sección de Tecnologías --}}
                                <div class="mt-2">
                                    <div class="project-detail-titles">Tecnologías</div>
                                    <div class="mt-1">
                                        @foreach ($project->technologies as $technology)
                                            <div class="text-center text-white d-inline-block mr-1">
                                                <div class="project-detail-skill">{{ $technology->name }}</div>
                                            </div>
                                        @endforeach
                                        <div class="text-center text-white d-inline-block mr-1">
                                            <a href="#availableTechnologies" data-toggle="modal">
                                                <img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Tecnología" height="40" width="40">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                {{-- Sección de Status --}}
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="project-detail-titles">Estado</div>
                                        <div class="mt-1 project-detail-dates">
                                            @if ($project->status == 0)
                                                <label class="label status-label status-label-purple">No Atendido</label>
                                            @elseif ($project->status == 1)
                                                <label class="label status-label status-label-gray">En Proceso</label>
                                             @elseif ($project->status == 2)
                                                <label class="label status-label status-label-blue">Testiando</label>
                                            @elseif ($project->status == 3)
                                                <label class="label status-label status-label-green">Completado</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal para agregar Miembros --}}
    <div class="modal fade text-left" id="availableEmployees" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel110">Miembros Disponibles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('admin.projects.assign-members') }}" method="POST">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="modal-body">
                        <div class="row ml-2 mr-2">
                            @if ($availableEmployees->count() > 0)
                                @foreach ($availableEmployees as $availableEmployee)
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                        <label class="form-check-label" for="employee-{{ $availableEmployee->id }}">
                                            <input type="checkbox" class="form-check-input" id="employee-{{ $availableEmployee->id }}" value="{{ $availableEmployee->id }}" name="employees[]">
                                            {{ $availableEmployee->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    No hay miembros disponibles para asignar...
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Asignar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal para agregar Tecnologías --}}
    <div class="modal fade text-left" id="availableTechnologies" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel110">Tecnologías Disponibles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('admin.projects.assign-technologies') }}" method="POST">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="modal-body">
                        <div class="row ml-2 mr-2">
                            @if ($availableTechnologies->count() > 0)
                                @foreach ($availableTechnologies as $availableTechnology)
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                        <label class="form-check-label" for="technology-{{ $availableTechnology->id }}">
                                            <input type="checkbox" class="form-check-input" id="technology-{{ $availableTechnology->id }}" value="{{ $availableTechnology->id }}" name="technologies[]">
                                            {{ $availableTechnology->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    No hay tecnologías disponibles para asignar...
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Asignar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection