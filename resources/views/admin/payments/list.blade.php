@extends('layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">

                <div id="table-head">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-1">Pagos</h3>

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


                                                <td>{{ $payment->user_id}}</td>

                                            
                                                        <td>{{ $payment->bill_id }}</td>

                                                        <td>{{ $payment->payment_method }}</td>

                                                        <td>{{ $payment->amount }}</td>

                                                        <td>{{ $payment->total}}</td> 
                                                        
                                                         

                                                        <td>{{ $payment->fee}}</td>   
 


                                                        <td><a href="{{route('admin.payments.billpayment')}}"><i id="eye"  style="font-size:15px;" class="far fa-eye"></i></a>    
                                                    
                                                    
                                                      </tr>
                                                      
                                                      
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mr-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection