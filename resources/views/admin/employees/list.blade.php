@extends('layouts.app')

@section('content')
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
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>FOTO</th>
                                                <th>NOMBRE</th>
                                                <th>APELLIDO</th>
                                                <th>FECHA DE NACIMIENTO</th>
                                                <th>FECHA DE INGRESO</th>
                                                <th>ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employees as $employee)
                                            <tr>
                                                <td>
                                                    @if (isset($employee->photo))
                                                    <img class="rounded-circle"
                                                    style="object-fit: cover;" width="70px" height="70px"
                                                    
                                                    src="{{ asset('storage/photo-profile/'.$employee->photo) }}">
                                                    @else
                                                    <img class="rorounded-circle" style="object-fit: cover;" width="70px" height="70px" src="{{ asset('images/valdusoft/valdusoft.png') }}" />
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
                                                    <a href="{{ route('admin.employees.show', [$employee->slug, $employee->id]) }}"><i class="fa fa-eye mr-1"></i></a>
                                                    <a href="{{ route('admin.employees.edit', $employee->id) }}"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
@endsection
