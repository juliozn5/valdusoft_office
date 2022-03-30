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
                        <a type="button"  data-toggle="modal" data-target="#exampleModal{{$key}}">
                        @if($employeeSuspendido->status == '1')
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
