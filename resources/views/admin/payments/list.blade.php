@extends('layouts.app')

@section('content')
    @if (Session::has('msj-store'))
        <script>
            $(document).ready(function() {
                toastr.success('El pago ha sido cargado con éxito.', 'Operación Completada');
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
                            <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                                Listado de Pagos
                            </div>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Financiero</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.payments.list') }}">Pagos</a>
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
                                <h3 class="card-title mb-2">Pagos</h3>
                                 @if ($bills->count() > 0)
                                    <a href="#" class="btn btn-primary  mb-2 waves-effect waves-light" data-toggle="modal"  data-target="#ModalGenerate"><i class="feather icon-plus "></i>&nbsp; Agregar Nuevo</a>
                               
                                @endif
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <th>FECHA</th>
                                            <th>USUARIO</th>
                                            <th>ID DE FACTURA</th>
                                            <th>PLATAFORMA DE PAGO</th>
                                            <th>ID DE PAGO</th>
                                            <th class="text-center">MONTO</th>
                                            <th class="text-center">DESCUENTO</th>
                                            <th class="text-center">TOTAL</th>
                                            <th class="text-center">ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($payments as $payment)
                                                <tr>
                                                    <td>{{ date('d-m-Y', strtotime($payment->date)) }}</td>
                                                    <td>{{ $payment->user->name }} {{ $payment->user->last_name }}</td>
                                                    <td class="text-center">#{{ $payment->bill_id }}</td>
                                                    <td class="text-center">
                                                        @if ($payment->payment_method == 'Crypto')
                                                            <img src="{{ asset('images/valdusoft/binance.png') }}" height="30" width="80px">
                                                        @else
                                                            <img src="{{ asset('images/valdusoft/bancolombia.png') }}" height="30" width="80px">
                                                        @endif
                                                    </td>
                                                    <td>{{ $payment->payment_id }}</td>
                                                    <td class="text-center">{{ number_format($payment->amount, 2, ',', '.')}}$</td>
                                                    <td class="text-center">{{ number_format($payment->discount_amount, 2, ',', '.') }}$</td>
                                                    <td class="text-center">{{ number_format($payment->total, 2, ',', '.') }}$</td>
                                                    <td class="text-center">
                                                        @if ($payment->status == 0)
                                                            <label class="label status-label status-label-purple ">Pendiente</label>
                                                        @elseif ($payment->status == 1)
                                                            <label class="label status-label status-label-green">Completado</label>
                                                        @elseif ($payment->status == 2)
                                                            <label class="label status-label status-label-blue">Rechazado</label>
                                                        @endif
                                                    </td>
                                                    <td class="text-center"><a href="{{ route('admin.bills.download', $payment->bill_id) }}" target="_blank"><i id="eye" style="font-size:15px;" class="far fa-eye"></i></a>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mr-3">
                                    {{ $payments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
@endsection
