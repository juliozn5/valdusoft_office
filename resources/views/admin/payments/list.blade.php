@extends('layouts.app')

@section('content')
@if (Session::has('msj-exitoso'))

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
                            <h3 class="card-title mb-2">Pagos</h3>

                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr class="">
                                            <th>FECHA</th>
                                            <th># DE FACTURA</th>
                                            <th>CLIENTE</th>
                                            <th>PLATAFORMA DE PAGO</th>
                                            <th>MONTO</th>
                                            <th>FEE</th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)

                                        <tr>

                                            <td>{{ date('d-m-Y', strtotime($payment->date)) }}</td>

                                            <td class="text-center">{{ $payment->bill_id }}</td>

                                            <td class="text-center">{{ $payment->user_id}}</td>

                                            <td class="text-center">{{ $payment->payment_method }}</td>

                                            <td class="text-center">{{ $payment->amount }}$</td>

                                            <td class="text-center">{{ $payment->fee}}</td>

                                            <td>
                                                @if ($payment->status == 0)
                                                <label class="label status-label status-label-purple ">No Atendido</label>
                                                @elseif ($payment->status == 1)
                                                <label class="label status-label status-label-gray">En Proceso</label>
                                                @elseif ($payment->status == 2)
                                                <label class="label status-label status-label-blue">Testiando</label>
                                                @elseif ($payment->status == 3)
                                                <label class="label status-label status-label-green">Completado</label>
                                                @endif
                                            </td>

                                            <td class="text-center"><a href="{{route('admin.payments.billpayment')}}"><i id="eye" style="font-size:15px;" class="far fa-eye"></i></a>

                                            <td>{{ $payment->total}}$</td>

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
        </section>
    </div>
</div>
</div>
</div>
</div>


@endsection