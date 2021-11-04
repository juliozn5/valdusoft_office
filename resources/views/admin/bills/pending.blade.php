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
                            <h3 class="card-title mb-1">Facturas Pendientes</h3> 
                            <a type="button" class="btn btn-primary mb-1" style="background-color: #06B054;color: white;" data-toggle="modal" data-target="#modalConfirm" id="btn-guardar">Confirmar Factura</a>   
                        </div>

                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr class="text-center text-uppercase ">
                                            <th>id</th>
                                            <th>usuario</th>
                                            <th>monto</th>
                                            <th>fecha de creacion</th>
                                            <th>estado</th>
                                            <th>tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($bills as $bill)
                                        <tr>
                                            <th scope="row">{{ $bill->id }}</th>
                                            <td>
                                                {{$bill->user->name}} {{$bill->user->last_name}}
                                            </td>
                                             <th scope="row">{{ $bill->amount }}</th>
                                            <td>
                                                {{ date('d/m/Y', strtotime($bill->date)) }}
                                            </td>
                                            <td>
                                               @if ($bill->status == 0)
                                                    <label class="label status-label status-label-blue">Pendiente</label>
                                               @elseif ($bill->status == 1)
                                                    <label class="label status-label 
                                                    status-label-gray">pagada</label>
                                                @endif
                                            </td>
                                            <td>
                                               @if ($bill->type == 'C')
                                                    <label class="label status-label status-label-blue">Cliente</label>
                                               @elseif ($bill->type == 'H')
                                                    <label class="label status-label status-label-blue">Hosting</label>
                                                @elseif ($bill->type == 'E')
                                                    <label class="label status-label status-label-blue">Empleado</label>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  {{-- MODAL --}}
    <div class="modal fade" id="modalConfirm" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-darck" id="#exampleModalToggle">Confirmar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.payments.store') }}" enctype="multipart/form-data" required >
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
                        <div class="modal-body">
                            <h4 class="text-center">Seleccione el método de pago</h4>
                            <div class="d-flex justify-content-center p-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="billetera" onchange="javascript:showContent()">
                                    <label class="form-check-label" for="inlineRadio1">Criptomoneda</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="bancolombia" onchange="javascript:showContent2()">
                                    <label class="form-check-label" for="inlineRadio2">Bancolombia</label>
                                </div>
                            </div>
                            
                            @include('admin.bills.partials.bancolombia')
                            @include('admin.bills.partials.billetera')  
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@include('admin.clients.partials.js')

@endsection