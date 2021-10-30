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

    {{-- MODAL --}}
    <div class="modal fade" id="ModalGenerate" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-darck" id="#exampleModalToggle">Cargar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.payments.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mt-2" for="bill_id">Seleccione la factura</label>
                            <select name="bill_id" id="bill_id" class="form-control" required>
                                <option value="" selected disabled>Seleccione una factura...</option>
                                @foreach ($bills as $bill)
                                    <option value="{{ $bill->id }}">
                                        #{{ $bill->id }} -  {{ number_format($bill->amount, 2, '.', ',') }}$ -
                                        @if ($bill->type == 'H')
                                            {{ $bill->hosting->url }} (Hosting)
                                        @else
                                            {{ $bill->user->name }} {{ $bill->user->last_name }}
                                            @if ($bill->type == 'C')
                                                (Cliente)
                                            @else
                                                (Empleado)
                                            @endif
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="payment_method">Método de Pago</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="" selected disabled>Seleccione el método de pago...</option>
                                <option value="Crypto">Criptomoneda</option>
                                <option value="Bancolombia">Bancolombia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="account">Cuenta / Billetera</label>
                            <input type="text" class="form-control" name="account" id="account" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="payment_id">Identificador del Pago</label>
                            <input type="text" class="form-control" name="payment_id" id="payment_id" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="discount_description">Concepto del Descuento</label>
                            <input type="text" class="form-control" name="discount_description" name="discount_description" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="discount">Monto a Descontar</label>
                            <input type="text" class="form-control" name="discount_amount" name="discount_amount" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="support">Soporte del Pago</label>
                            <input type="file" class="form-control" name="support" name="support" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
