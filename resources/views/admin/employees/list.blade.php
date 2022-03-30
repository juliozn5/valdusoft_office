@extends('layouts.app')

@section('content')
<style>

</style>
    @if (Session::has('msj-exitoso'))
        <script>
            $(document).ready(function(){
                toastr.success('El empleado ha sido creado con éxito.', 'Operación Completada');
            });
        </script>
    @endif


    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row" id="table-head">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Empleados</h3>
                                <a href="{{ route('admin.employees.create') }}" class="btn btn-primary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i> Añadir Nuevo</a>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link active alert alert-success rounded " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Activos <i class="fa fa-check" aria-hidden="true"></i></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link alert alert-danger rounded" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Suspendidos <i class="fa fa-times" aria-hidden="true"></i></a>
                                </li>

                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="">
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr class="text-center">
                                                        <th>FOTO</th>
                                                        <th>NOMBRE</th>
                                                        <th>APELLIDO</th>
                                                        <th>FECHA DE NACIMIENTO</th>
                                                        <th>FECHA DE INGRESO</th>
                                                        <th>ESTADO</th>
                                                        <th>ACCIÓN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($employees as $key => $employee)
                                                    <tr class="text-center">
                                                        <td>
                                                            @if (isset($employee->photo))
                                                            <img class="rounded-circle"
                                                            style="object-fit: cover;" width="70px" height="70px"

                                                            src="{{ asset('storage/photo-profile/'.$employee->photo) }}">
                                                            @else
                                                            <i class="rounded-circle feather icon-user" style="font-size: 70px;"></i>
                                                            @endif
                                                        </td>
                                                        <td>{{ $employee->name }}</td>
                                                        <td>{{ $employee->last_name }}</td>
                                                        <td>
                                                            @if (!is_null($employee->birthdate))
                                                                {{ date('d-m-Y', strtotime($employee->birthdate)) }}
                                                            @else
                                                                Dato no disponible
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (!is_null($employee->admission_date))
                                                                {{ date('d-m-Y', strtotime($employee->admission_date)) }}
                                                            @else
                                                                Dato no disponible
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($employee->status == 1)
                                                            <h6 class="alert alert-success">Activo <i class="fa fa-check" aria-hidden="true"></i></h6>
                                                            @else
                                                            <h6 class="alert alert-danger">Suspendido <i class="fa fa-times" aria-hidden="true"></i></h6>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.employees.show', [$employee->slug, $employee->id]) }}"><i class="fa fa-eye mr-1"></i></a>
                                                            <a href="{{ route('admin.employees.edit', $employee->id) }}"><i class="fa fa-edit mr-1"></i></a>
                                                            <a type="button"  data-toggle="modal" data-target="#exampleModal{{$key}}">
                                                            @if($employee->status == '1')
                                                               <i class="fa fa-toggle-on" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Suspender Empleado"></i>
                                                            @else
                                                            <i class="fa fa-toggle-off" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Activar Empleado"></i>
                                                            @endif
                                                           </a>

                                                        </td>
                                                        @include('admin.employees.modalStatus')
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{--MODAL--}}

                                        </div>

                                        <div class="mr-3">
                                            {{ $employees->links() }}
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="z-index: -10;">
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr class="text-center">
                                                        <th>FOTO</th>
                                                        <th>NOMBRE</th>
                                                        <th>APELLIDO</th>
                                                        <th>FECHA DE NACIMIENTO</th>
                                                        <th>FECHA DE INGRESO</th>
                                                        <th>ESTADO</th>
                                                        <th>ACCIÓN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($employeesSuspendidos as $key => $employeeSuspendido)
                                                    <tr class="text-center">
                                                        <td>
                                                            @if (isset($employeeSuspendido->photo))
                                                            <img class="rounded-circle"
                                                            style="object-fit: cover;" width="70px" height="70px"

                                                            src="{{ asset('storage/photo-profile/'.$employeeSuspendido->photo) }}">
                                                            @else
                                                            <i class="rounded-circle feather icon-user" style="font-size: 70px;"></i>
                                                            @endif
                                                        </td>
                                                        <td>{{$employeeSuspendido->name }}</td>
                                                        <td>{{$employeeSuspendido->last_name }}</td>
                                                        <td>
                                                            @if (!is_null($employeeSuspendido->birthdate))
                                                                {{ date('d-m-Y', strtotime($employeeSuspendido->birthdate)) }}
                                                            @else
                                                                Dato no disponible
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (!is_null($employeeSuspendido->admission_date))
                                                                {{ date('d-m-Y', strtotime($employeeSuspendido->admission_date)) }}
                                                            @else
                                                                Dato no disponible
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($employeeSuspendido->status == 1)
                                                            <h6 class="alert alert-success">Activo <i class="fa fa-check" aria-hidden="true"></i></h6>
                                                            @else
                                                            <h6 class="alert alert-danger">Suspendido <i class="fa fa-times" aria-hidden="true"></i></h6>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.employees.show', [$employeeSuspendido->slug, $employeeSuspendido->id]) }}"><i class="fa fa-eye mr-1"></i></a>
                                                            <a href="{{ route('admin.employees.edit', $employeeSuspendido->id) }}"><i class="fa fa-edit mr-1"></i></a>
                                                            <a type="button"  data-toggle="modal" data-target="#exampleModalSuspender{{$key}}">
                                                            @if($employeeSuspendido->status == '1')
                                                               <i class="fa fa-toggle-on" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Suspender Empleado"></i>
                                                            @else
                                                            <i class="fa fa-toggle-off" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Activar Empleado"></i>
                                                            @endif
                                                           </a>

                                                        </td>
                                                        @include('admin.employees.modalStatusSuspendido')
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{--MODAL--}}

                                        </div>

                                        <div class="mr-3">
                                            {{ $employees->links() }}
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
