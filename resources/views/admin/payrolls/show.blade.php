@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                            Detalles de Nómina
                            </div>
                            <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Financiero</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.payrolls.list') }}">Nóminas</a>
                            </ol>
                            </div>
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
                            <h3 class="card-title mb-1">Empleados en la Nómina</h3>
                            <a href="{{ route('admin.payrolls.store-bills', $payroll->id) }}" class="btn btn-primary mb-2 waves-effect waves-light">&nbsp; <strong>GENERAR FACTURAS</strong></a>
                        </div>

                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">EMPLEADO</th>
                                            <th class="text-center">BILLETERA</th>
                                            <th class="text-center">HORAS</th>
                                            <th class="text-center">PRECIO POR HORA</th>
                                            <th class="text-center">QUINCENA</th>
                                            <th class="text-center">BONO</th>
                                            <th class="text-center">PRESTAMO / ABONO</th>
                                            <th class="text-center">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payroll->payrolls_employee as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->user->name }} {{ $item->user->last_name }}</td>
                                                <td class="text-center">
                                                    @if (!is_null($item->user->tron_wallet))
                                                        {{ $item->user->tron_wallet }}
                                                    @else
                                                        Dato no disponible
                                                    @endif 
                                                </td>
                                                <td class="text-center">{{ $item->total_hours }} horas</td>
                                                <td class="text-center">{{ number_format($item->price_by_hour, 2, ',', '.') }}$</td>       
                                                <td class="text-center">{{ number_format($item->total_hours * $item->price_by_hour, 2, ',', '.') }}$</td>
                                                <td class="text-center">
                                                    @if (!is_null($item->bond))
                                                        + <span title="{{ $item->bond->description }}">{{ number_format($item->bond->amount, 2, ',', '.') }}$</span>
                                                    @else
                                                        0$
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (!is_null($item->financing))
                                                        + <span title="{{ $item->financing->description }}">{{ number_format($item->financing->total_amount, 2, ',', '.') }}$</span>
                                                    @else
                                                        @if (!is_null($item->financing_payment))
                                                            - <span title="{{ $item->financing_payment->description }}">{{ number_format($item->financing_payment->amount, 2, ',', '.') }}$</span>
                                                        @else
                                                            0$
                                                        @endif
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{ number_format($item->total_amount, 2, ',', '.') }}$
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="6"></th>
                                            <th class="text-center" style="background-color: #9D9EAF;"><span style="color: white;">TOTAL</span></th>
                                            <th class="text-right" style="background-color: #9D9EAF;"><span style="color: white;">{{ number_format($payroll->amount, 2, ',', '.') }}$</span></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            {{-- <div class="float-right mr-3 mb-2">
                                <strong>TOTAL</strong>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection