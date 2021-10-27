@extends('layouts.app')

@push('body-atribute')
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/app-assets/css/pages/app-invoice.css') }}">
@endpush

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                       <div class="col-12">
                            <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                                Detalles de Factura
                            </div>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('employee.home') }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Financiero</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('employee.bills.list') }}">Facturas</a>
                                </ol>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="content-body">
                <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                {{-- Datos de Encabezado --}}
                                <div class="card-body invoice-padding pb-0">
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-2">
                                        {{-- Datos de Valdusoft --}}
                                        <div>
                                            <div class="logo-wrapper">
                                                <img src="https://clients.valdusoft.com/images/valdusoft/logo-bill.jpg" alt="" width="120" height="70">
                                            </div>		
                                            <p class="card-text mb-25">San Cristobal - Tachira</p>
                                            <p class="card-text mb-25"><a href="https://valdusoft.com" target="_blank" style="color: #170c66;"><u>Valdusoft.com</u></a></p>
                                            <p class="card-text mb-25"><a href="mailto:financiero@valdusoft.com" target="_blank">financiero@valdusoft.com</a></p>
                                            <p class="card-text mb-0"><b>Alexis Valera</b></p>
                                        </div>

                                        {{-- Datos De Identificación de la Factura --}}
                                        <div class="mt-md-0 mt-2">
                                            <h4 class="invoice-title">
                                                Factura
                                                <span class="invoice-number">#{{ $bill->id }}</span>
                                            </h4>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Fecha de Inicio:</p>
                                                <p class="invoice-date">{{ date('d-m-Y', strtotime($bill->payroll_employee->payroll->start_date)) }}</p>
                                            </div>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Fecha de Fin:</p>
                                                <p class="invoice-date">{{ date('d-m-Y', strtotime($bill->payroll_employee->payroll->dead_line)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Fin de Datos de Encabezado --}}

                                <hr class="invoice-spacing" />

                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        {{-- Datos del Destinatario --}}
                                        <div class="col-xl-8 p-0">
                                            <h6 class="mb-2">Empleado:</h6>
                                            <h6 class="mb-25">{{ $bill->user->name }} {{ $bill->user->last_name }}</h6>
                                            <p class="card-text mb-25">{{ $bill->user->phone }}</p>
                                            <p class="card-text mb-0">{{ $bill->user->email }}</p>
                                        </div>

                                        {{-- Datos del Pago --}}
                                        @if (!is_null($bill->payment))
                                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                <h6 class="mb-2">Detalles del Pago:</h6>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="pr-1">Método de Pago:</td>
                                                            <td><span class="font-weight-bold">{{ $bill->payment->payment_method }}</span></td>
                                                        </tr>
                                                        <tr>

                                                            <td class="pr-1">Billetera / # Cuenta:</td>
                                                            <td><span class="font-weight-bold">{{ $bill->payment->account }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pr-1">Identificador del Pago:</td>
                                                            <td><span class="font-weight-bold">{{ $bill->payment->payment_id }}</span></td>
                                                        </tr>
                                                        @if (!is_null($bill->payment->support))
                                                            <tr>
                                                                <td class="pr-1">Comprobante del Pago:</td>
                                                                <td><span class="font-weight-bold"><a href="{{ asset('uploads/images/payment-supports/'.$bill->payment->support) }}" target="_blank">Ver</a></span></td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- Descripción --}}
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="py-1">Descripción</th>
                                                <th class="py-1 text-center">Unidades</th>
                                                <th class="py-1 text-center">Precio Unitario</th>
                                                <th class="py-1 text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-bottom">
                                                <td class="py-1">Horas acumuladas en la quincena</td>
                                                <td class="py-1 text-center"><span class="font-weight-bold">{{ $bill->payroll_employee->total_hours }}</span></td>
                                                <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->price_by_hour, 2, '.', ',') }}$</span></td>
                                                <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->price_by_hour * $bill->payroll_employee->total_hours, 2, '.', ',') }}$</span></td>
                                            </tr>
                                            @if(!is_null($bill->payroll_employee->bond))
                                                <tr class="border-bottom">
                                                    <td class="py-1">{{ $bill->payroll_employee->bond->description }}</td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">1</span></td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->bond->amount, 2, '.', ',') }}$</span></td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->bond->amount, 2, '.', ',') }}$</span></td>
                                                </tr>
                                            @endif
                                            @if(!is_null($bill->payroll_employee->financing))
                                                <tr class="border-bottom">
                                                    <td class="py-1">{{ $bill->payroll_employee->financing->description }}</td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">1</span></td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->financing->total_amount, 2, '.', ',') }}$</span></td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->financing->total_amount, 2, '.', ',') }}$</span></td>
                                                </tr>
                                            @endif
                                            @if(!is_null($bill->payroll_employee->financing_payment))
                                                <tr class="border-bottom">
                                                    <td class="py-1">{{ $bill->payroll_employee->financing_payment->description }}</td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">1</span></td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->financing_payment->amount, 2, '.', ',') }}$</span></td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">- {{ number_format($bill->payroll_employee->financing_payment->amount, 2, '.', ',') }}$</span></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body invoice-padding pt-1 pb-1">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-12 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Total:</p>
                                                    <p class="invoice-total-amount">{{ number_format($bill->amount, 2, '.', ',') }}$</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Sección de Botones --}}
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body p-2">
                                    <a class="btn btn-primary btn-block btn-download-invoice mb-75" href="{{ route('employee.bills.download', $bill->id) }}" target="_blank">
                                        <i class="fas fa-download"></i> Descargar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection