@extends('layouts.app')

@section('content')
@if (Session::has('msj-exitoso'))
<script>
    $(document).ready(function() toastr.success('El proyecto ha sido asignado con éxito.', 'Operación Completada');
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
                        <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">Empleados</div>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.employees.list') }}">Empleados</a></li>
                                <li class="breadcrumb-item">Detalle del Empleado</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row" style="display: flex; align-items: center;">
                                <div class="col-md-4">
                                    @if (!is_null($employee->photo))
                                    <img class="rounded-circle" style="object-fit:cover;" src="{{ asset('storage/photo-profile/'.$employee->photo) }}"  alt="{{ $employee->fullname }}" height="80" width="80">
                                    @else
                                    <img class="rounded-circle" style="object-fit:cover;" src="{{ asset('images/valdusoft/valdusoft.png') }}" height="100" width="100">
                                    @endif

                                </div>
                                <div class="col-md-8">
                                    <h3 class="card-title">{{ $employee->name }} {{ $employee->last_name }}</h3>
                                    {{ $employee->email }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body" >
                            {{-- Sección de Proyectos Asignados --}}
                            <div class="pl-4 pr-2 mt-1">
                                <div class="project-detail-titles">Proyectos Asignados</div>
                                <div class="mt-1">
                                    @php $cont = 0; @endphp
                                    @foreach ($employee->projects as $project)
                                    <a href="">
                                        <div class="text-center text-white d-inline-block mr-1">
                                            <a href="{{ route('admin.projects.show', [$project->slug, $project->id]) }}"><div class="project-circle text-white" style="background-color: {{ $projectColors[$cont] }};"> P{{ $project->id }}</div></a>
                                        </div>
                                    </a>
                                    @php
                                    if ($cont == 2){
                                    $cont = 0;
                                    }else{
                                    $cont++;
                                    }
                                    @endphp
                                    @endforeach
                                    <a href="#availableProjects" data-toggle="modal">
                                        <div class="text-center d-inline-block mr-1">
                                            <div class="project-circle project-circle-add"><i class="fa fa-plus"></i></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            {{-- Sección de Fechas --}}
                            <div class="row mt-3 pl-4 pr-2">
                                <div class="col-3">
                                    <div class="project-detail-titles">Fecha de Nacimiento</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i> {{ (is_null($employee->birthdate)) ? 'Dato no disponible' : date('d-m-Y', strtotime($employee->birthdate)) }}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="project-detail-titles">Fecha de Ingreso</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i> {{ (is_null($employee->admission_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($employee->admission_date)) }}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="project-detail-titles">Próximas Vacaciones</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i>{{
                                        (is_null($fechaUser)) ? 'Dato no disponible' : date('d-m-Y', strtotime($fechaUser)) }}

                                    </div>
                                </div>
                            </div>

                            {{-- Sección de Skills --}}
                            <div class="mt-3 pl-4 pr-2">
                                <div class="project-detail-titles">Skills</div>
                                <div class="mt-1">
                                    @if ($employee->skills_count)
                                    @foreach ($employee->skills as $skill)
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-detail-skill">{{ $skill->skill }}</div>
                                    </div>
                                    @endforeach
                                    @else
                                    El empleado no posee ningún skill asociado
                                    @endif
                                </div>
                            </div>

                            {{-- Sección de Curriculum --}}
                            <div class="mt-3 pl-4 pr-2">
                                <div class="project-detail-titles">Curriculum Vitae</div>
                                <div class="mt-1">
                                    @if (!is_null($employee->curriculum))
                                    <a href="{{ asset('uploads/documents/curriculums/'.$employee->curriculum) }}" target="_blank" style="color: #3C3232 !important;"><img src="{{ asset('images/icons/arrow-down.png') }}" class="mr-1"> {{ $employee->curriculum }}</a>
                                    @else
                                    <img src="{{ asset('images/icons/arrow-down.png') }}" class="mr-1"> Archivo no disponible
                                    @endif
                                </div>
                            </div>

                            {{-- Sección de Sueldo --}}
                            <div class="row mt-3 pl-4 pr-2">
                                <div class="col-3">
                                    <div class="project-detail-titles">Precio por hora</div>
                                    <div class="mt-1 project-detail-dates">
                                        <img src="{{ asset('images/icons/dollar.png') }}" class="mr-1"> {{ (is_null($employee->price_per_hour)) ? 'Dato no disponible' : $employee->price_per_hour.' USD' }}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="project-detail-titles">Billetera USDT-TRON</div>
                                    <div class="mt-1 project-detail-dates">
                                        <img src="{{ asset('images/icons/tether-usdt-logo.png') }}" width="30" height="30" class="mr-1"> {{ (is_null($employee->tron_wallet)) ? 'Dato no disponible' : $employee->tron_wallet }}
                                    </div>
                                </div>
                            </div>

                            {{-- Sección de Sueldo --}}
                            <div class="row mt-3 pl-4 pr-2">
                                <div class="col-6">
                                    <div class="project-detail-titles">Financiamiento</div>
                                    <div class="mt-1 project-detail-dates">

                                        <img src="{{ asset('images/icons/dollar.png') }}" class="mr-1"> {{ (is_null($restante)) ? 'Dato no disponible' : $restante.' USD' }}
                                    </div>
                                </div>
                            </div>
                            {{-- Sección de Facturas --}}
                            <div class="mt-3">
                                <hr>
                                <br>
                                <h2 class="h3 ml-2">Facturas</h2>

                                <div class="table-responsive pt-2">
                                    <table class="table">
                                        <thead class="thead-light text-center">
                                            <th>ID</th>
                                            <th>FECHA</th>
                                            <th>MONTO</th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($facturas as $factura)
                                            <tr class="text-center">
                                                <td>{{$factura->id}}</td>
                                                <td>{{$factura->date}}</td>
                                                <td>{{$factura->amount}}$</td>
                                                <td>
                                                    @if($factura->status == '0')
                                                        <div class="badge badge-warning">
                                                            En Espera
                                                        </div>
                                                    @elseif($factura->status == '1')
                                                        <div class="badge badge-success">
                                                            Pagado
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="" href="{{ route('admin.bills.downloadPDF', $factura->id) }}" target="_blank">
                                                        <i class="ml-1 fas fa-download" style="font-size:20px;"></i>
                                                    </a>
                                                    <a class="" href="{{ route('admin.bills.download', $factura->id) }}" target="_blank">
                                                        <i class="ml-1 far fa-file-pdf" style="font-size:23px;"></i>
                                                    </a>
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

<div class="modal fade text-left" id="availableProjects" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel110">Proyectos Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.employees.assign-projects') }}" method="POST">
                @csrf
                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                <div class="modal-body">
                    <div class="row ml-2 mr-2">
                        @if ($availableProjects->count() > 0)
                        @foreach ($availableProjects as $availableProject)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <label class="form-check-label" for="project-{{ $availableProject->id }}">
                                <input type="checkbox" class="form-check-input" id="project-{{ $availableProject->id }}" value="{{ $availableProject->id }}" name="projects[]">
                                {{ $availableProject->name }}
                            </label>
                        </div>
                        @endforeach
                        @else
                        <div class="col-12">
                            No hay proyectos disponibles para asignar...
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
