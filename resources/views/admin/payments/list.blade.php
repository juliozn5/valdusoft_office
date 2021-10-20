@extends('layouts.app')

@section('content')
    @if (Session::has('msj-exitoso'))

    @endif
 @include('layouts.partials.navbar')

 @include('layouts.partials.sidebar')
  
  <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
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
                              <li class="breadcrumb-item"><a href="{{ route('admin.payments.list') }}">Pagos</a>
                              </li>
                         </ol>
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
                                    <a href="#" class="btn btn-primary  mb-2 waves-effect waves-light" data-toggle="modal"  data-target="#ModalGenerate"><i class="feather icon-plus "></i>&nbsp; Agregar Nuevo</a>
                                </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                  <table class="table mb-0">
                                     <thead class="thead-light">
                                          <tr class="text-center">
                                               <th>FECHA</th>
                                               <th>CLIENTE</th>   
                                               <th>ID DE FACTURA</th>                                     
                                               <th>PLATAFORMA DE PAGO</th>
                                               <th>MONTO</th>
                                               <th>FEE</th>
                                               <th>TOTAL</th>
                                               <th>ESTADO</th>
                                               <th>ACCIÓN</th>        
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @foreach ($payments as $payment)

                                               <tr>
                                                 <td>{{ date('d-m-Y', strtotime($payment->date)) }}</td>
                                                 <td class="text-center">{{ $payment->user->slug}}</td>
                                                 <td class="text-center">{{ $payment->bill_id }}</td>                                                            
                                                 <td>
                                                    @if ($payment->payment_method == 0)
                                                       <img src="{{ asset('images/valdusoft/paypal.png') }}" height="36" width="140px">
                                                    @elseif ($payment->payment_method == 1)
                                                       <img src="{{ asset('images/valdusoft/uphold.png') }}" height="36" width="140px"> 
                                                    @endif
                                                 </td>
                                                 <td class="text-center">{{number_format($payment->amount, 2, ',', '.')}} $</td>
                                                 <td class="text-center">{{number_format($payment->fee, 2, ',', '.')}}</td>
                                                 <td class="text-center">{{number_format($payment->total, 2, ',', '.')}} $</td>
                                                 <td>
                                                   @if ($payment->status == 0)
                                                       <label class="label status-label status-label-purple ">Pendiente</label>
                                                   @elseif ($payment->status == 1)
                                                       <label class="label status-label status-label-gray">Completado</label>
                                                   @elseif ($payment->status == 2)
                                                       <label class="label status-label status-label-blue">Rechazado</label>
                                                   @endif
                                                 </td>
                                                 <td class="text-center"><a href="{{route('admin.payments.billpayment')}}"><i id="eye" style="font-size:15px;" class="far fa-eye"></i></a>
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
                    <h5 class="modal-title text-darck" id="#exampleModalToggle">Realizar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
               </div>
                
               <form action="{{ route('payments.generate')}}" method="POST">
                 @csrf
                 <div class="modal-body">
                     <input type="hidden" name="id" value="">
                      ¿Desea crear un nuevo pago?
                      <br>
                      <br>
                      <label>Seleccione un usuario</label>
                      <select name="user_id" required class="form-control" >
                            <option value="">Seleccione un usuario</option>
                            @foreach ($users as $user)
                              <option value="{{$user->id}}">{{$user->slug}}</option>
                            @endforeach
                      </select>
                       
                      <label class="mt-2">Seleccione la factura</label>
                      <select name="bill_id" required class="form-control">
                            <option value="">Seleccione una factura</option>
                            @foreach ($bills as $bill)
                              <option value="{{$bill->id}}">{{$bill->id}}</option>
                            @endforeach
                      </select>

                      <label class="mt-2">Seleccione metodo de pago</label>
                      <select name="payment_method" id="payment_method"
                              class="form-control"
                              required data-toggle="select">
                              <option value="">Seleccione un metodo de pago</option>
                              <option value="0">Paypal</option>
                              <option value="1">Uphold</option>
                      </select>

                      <div class="form-group mt-2">
                            <label for="amount">monto</label>
                            <input type="text" name="amount" class="form-control" id="amount" placeholder="monto" required >
                      </div> 
                             
                      <div class="form-group">
                            <label for="fee">feed de pago</label>
                            <input type="text" name="fee" class="form-control" id="fee" placeholder="fee" required >
                      </div>
   
                      <div class="form-group">
                           <label for="total">total a pagar</label>
                           <input type="text" name="total" class="form-control" id="total" placeholder="total" required >
                      </div>
                                                     
                      <div class="form-group">
                           <label for="date">Fecha</label>
                           <input type="date" name="date" class="form-control" id="date" required >
                      </div> 
                            
                      <div class="modal-footer">
                         <button type="submit" class="btn btn-primary 
                          waves-effect waves-light">Guardar</button>
                          <button type="button" class="btn btn-danger"
                          data-dismiss="modal">Cancelar</button>          
                      </div>
                  </div>    
             </form>
          </div>
      </div>
  </div>
@endsection