@extends('layouts.app')

@push('body-atribute')
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('scripts')
    <script>
        function editPayroll($payroll) {
            
            $("#payroll_id").val($payroll.id);
            $("#payroll_amount").val($payroll.amount);
            $("#date").val($payroll.date);
            $("#payroll_status option[value=" + $payroll.status + "]").attr("selected", true);
        }
    </script>
@endpush

@section('content')
    @if (Session::has('payroll-created'))
        <script>
            $(document).ready(function() {
                toastr.success('La nómina ha sido generada con éxito.', 'Operación Completada');
            });
        </script>
    @endif

    @if (Session::has('payroll-updated'))
        <script>
            $(document).ready(function() {
                toastr.success('La nómina ha sido actualizada con éxito.', 'Operación Completada');
            });
        </script>
    @endif

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"> </div>

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Financiero</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.payrolls.list') }}">Financiero</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.payrolls.list') }}">Nómina</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div id="table-head">
                <div class="col">
                    <div class="card" id="card-head1">
                        <div class="card-header">
                            <h3 class="card-title mb-1">Listado de las Nóminas</h3>
                            <a href="{{ route('admin.payrolls.create') }}" class="btn btn-primary mb-2 waves-effect waves-light">&nbsp; GENERAR</a>
                        </div>

                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light ">

                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">FECHA DE INICIO</th>
                                            <th class="text-center">FECHA DE CIERRE</th>
                                            <th class="text-center">MONTO</th>
                                            <th class="text-center">ESTADO</th>
                                            <th class="text-center">ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payrolls as $payroll)

                                        <tr>
                                            <td class="text-center">{{ $payroll->id}}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($payroll->start_date)) }}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($payroll->dead_line)) }}</td>                                      
                                            <td class="text-center">{{number_format($payroll->amount, 2, ',', '.')}} </td>
                                            <td class="text-center">
                                                @if ($payroll->status == 0)
                                                    <label class="label status-label status-label-purple ">En Espera</label>
                                                @elseif ($payroll->status == 1)
                                                    <label class="label status-label status-label-green">Pagada</label>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.payrolls.show', $payroll->id) }}"><i id="eye" style="font-size:15px;" class="far fa-eye"></i></a>
                                                <a href="{{ route('admin.payrolls.edit', $payroll->id) }}"><i style="font-size:20px;" class="far fa-edit ml-1"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mr-3">
                                {{ $payrolls->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection