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

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"> </div>

        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Nóminas</h2>
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
            <div class="col-11" style="margin-left:15px">
                <div class="card" id="card-head1">
                    <div class="card-header">
                        <h3 class="card-title mb-1">Listado de las nominas</h3>
                        <a href="{{ route('admin.payrolls.generate') }}" class="btn btn-primary mb-2 waves-effect waves-light">&nbsp; GENERAR</a>
                    </div>

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light ">

                                    <tr>
                                        <th>ID</th>
                                        <th>FECHA</th>
                                        <th>MONTO</th>
                                        <th>ESTADO</th>
                                        <th class="col-2">ACCIÓN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payrolls as $payroll)

                                    <tr>
                                        <td>{{ $payroll->id}}</td>

                                        <td>{{ date('d-m-Y', strtotime($payroll->date)) }}</td>

                                        <td>{{ $payroll->amount }}$</td>

                                        <td>
                                            @if ($payroll->status == 0)
                                            <label class="label status-label status-label-purple ">No Atendido</label>
                                            @elseif ($payroll->status == 1)
                                            <label class="label status-label status-label-gray">En Proceso</label>
                                            @elseif ($payroll->status == 2)
                                            <label class="label status-label status-label-blue">Testiando</label>
                                            @elseif ($payroll->status == 3)
                                            <label class="label status-label status-label-green">Completado</label>
                                            @endif
                                        </td>

                                        <td><a href="{{route('admin.payrolls.DetailPayroll')}}"><i id="eye" style="font-size:15px;" class="far fa-eye"></i></a>

                                            <a href="#edit" data-toggle="modal" onclick="editPayroll({{$payroll}});"><i id="eye" href="#" style="font-size:20px;" class="far fa-edit ml-1"></i></a>
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


        <!--  MODAL EDITAR NOMINA  -->

        <div class="modal  fade text-left " id="edit" tabindex="-1" role="dialog" aria-modal="true">
            <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title">Editar Nómina</h5>

                        <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>

                    </div>
                    <form action="{{ route('admin.payrolls.updatePayroll') }}" method="POST">
                        @csrf

                        <input type="hidden" name="payroll_id" id="payroll_id" value="">
                        <div class="modal-body">

                        </div>
                        <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <label for="payroll_amount">Monto</label>
                                    <input name="payroll_amount" id="payroll_amount" class="form-control">
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <label for="date">Fecha</label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>

                                <div class="col-6">

                                    <label for="payroll_status">Estado</label>
                                    <select name="status" id="payroll_status" class="form-control">
                                        <option value="0">Pendiente</option>
                                        <option value="1">Completado</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>                        <br><br>
                            
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection