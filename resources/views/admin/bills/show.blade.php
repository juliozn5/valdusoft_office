@extends('layouts.app')

@push('body-atribute')
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/app-assets/css/pages/app-invoice.css') }}">
@endpush

@push('scripts')
    <script>
        function loadDiv(){
            if ($("#payment_type").val() == 'Abono'){
                $("#discount_div").addClass('hidden');
                $("#discount_description").attr('required', false);
                $("#discount_amount").attr('required', false);
                $("#payment_div").removeClass('hidden');
                $("#amount").attr('required', true);
                $("#payment_method").attr('required', true);
                $("#payment_id").attr('required', true);
                $("#fee").attr('required', true);
            }else{
                $("#payment_div").addClass('hidden');
                $("#amount").attr('required', false);
                $("#payment_method").attr('required', false);
                $("#payment_id").attr('required', false);
                $("#fee").attr('required', false);
                $("#discount_div").removeClass('hidden');
                $("#discount_description").attr('required', true);
                $("#discount_amount").attr('required', true);

            }
        }

        function loadSupportDiv(){
            if ($("#payment_method").val() == 'Crypto'){
                $("#support_div").addClass('hidden');
                $("#support").attr('required', false);
            }else{
                $("#support_div").removeClass('hidden');
                $("#support").attr('required', true);
            }
        }
    </script>
@endpush

@section('content')
    @if (Session::has('msj-store'))
        <script>
            $(document).ready(function() {
                toastr.success('El pago ha sido cargado con éxito.', 'Operación Completada');
            });
        </script>
    @endif

    @if (Session::has('msj-send'))
        <script>
            $(document).ready(function() {
                toastr.success('El correo ha sido enviado con éxito.', 'Operación Completada');
            });
        </script>
    @endif

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    @push('breadcrumbs')
                    <div class="row">
                        <div class="col-4">
                            <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                                Detalles de Factura
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Financiero</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.bills.list') }}">Facturas</a>
                                </ol>
                            </div>
                        </div>
                    </div>
                    @endpush
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
                                            @if ($bill->type == 'E')
                                                <div class="invoice-date-wrapper">
                                                    <p class="invoice-date-title">Fecha de Inicio:</p>
                                                    <p class="invoice-date">{{ date('d-m-Y', strtotime($bill->payroll_employee->payroll->start_date)) }}</p>
                                                </div>
                                                <div class="invoice-date-wrapper">
                                                    <p class="invoice-date-title">Fecha de Fin:</p>
                                                    <p class="invoice-date">{{ date('d-m-Y', strtotime($bill->payroll_employee->payroll->dead_line)) }}</p>
                                                </div>
                                            @else
                                                <div class="invoice-date-wrapper">
                                                    <p class="invoice-date-title">Fecha:</p>
                                                    <p class="invoice-date">{{ $bill->date }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- Fin de Datos de Encabezado --}}

                                <hr class="invoice-spacing" />

                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        {{-- Datos del Destinatario --}}
                                        <div class="col-xl-8 p-0">
                                            @if ($bill->type == 'E')
                                                <h6 class="mb-2">Empleado:</h6>
                                                <h6 class="mb-25">{{ $bill->user->name }} {{ $bill->user->last_name }}</h6>
                                                <p class="card-text mb-25">{{ $bill->user->phone }}</p>
                                                <p class="card-text mb-0">{{ $bill->user->email }}</p>
                                            @elseif ($bill->type == 'C')
                                                <h6 class="mb-2">Cliente:</h6>
                                                <h6 class="mb-25">{{ $bill->user->name }} {{ $bill->user->last_name }}</h6>
                                                <p class="card-text mb-25">{{ $bill->user->phone }}</p>
                                                <p class="card-text mb-0">{{ $bill->user->email }}</p>
                                            @else
                                                <h6 class="mb-2">Hosting:</h6>
                                                <h6 class="mb-25">{{ $bill->hosting->url }}</h6>
                                            @endif
                                        </div>

                                        {{-- Datos del Pago --}}
                                        @if ($bill->type != 'C')
                                            @if ($bill->payments->count() > 0)
                                                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                    <h6 class="mb-2">Detalles del Pago:</h6>
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="pr-1">Método de Pago:</td>
                                                                <td><span class="font-weight-bold">{{ $bill->payments[0]->payment_method }}</span></td>
                                                            </tr>
                                                            <tr>

                                                                <td class="pr-1">Billetera / # Cuenta:</td>
                                                                <td><span class="font-weight-bold">{{ $bill->payments[0]->account }}</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pr-1">Identificador del Pago:</td>
                                                                <td><span class="font-weight-bold">{{ $bill->payments[0]->payment_id }}</span></td>
                                                            </tr>
                                                            @if (!is_null($bill->payments[0]->support))
                                                                <tr>
                                                                    <td class="pr-1">Comprobante del Pago:</td>
                                                                    <td><span class="font-weight-bold"><a href="{{ asset('uploads/images/payment-supports/'.$bill->payments[0]->support) }}" target="_blank">Ver</a></span></td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
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
                                            @if ($bill->type == 'E')
                                                <tr class="border-bottom">
                                                    <td class="py-1">Horas acumuladas en la quincena</td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">{{ $bill->payroll_employee->total_hours }}</span></td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->price_by_hour, 2, '.', ',') }}</span></td>
                                                    <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->price_by_hour * $bill->payroll_employee->total_hours, 2, '.', ',') }}</span></td>
                                                </tr>
                                                @if(!is_null($bill->payroll_employee->bond))
                                                    <tr class="border-bottom">
                                                        <td class="py-1">{{ $bill->payroll_employee->bond->description }}</td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">1</span></td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->bond->amount, 2, '.', ',') }}</span></td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->bond->amount, 2, '.', ',') }}</span></td>
                                                    </tr>
                                                @endif
                                                @if(!is_null($bill->payroll_employee->financing))
                                                    <tr class="border-bottom">
                                                        <td class="py-1">{{ $bill->payroll_employee->financing->description }}</td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">1</span></td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->financing->total_amount, 2, '.', ',') }}</span></td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->financing->total_amount, 2, '.', ',') }}</span></td>
                                                    </tr>
                                                @endif
                                                @if(!is_null($bill->payroll_employee->financing_payment))
                                                    <tr class="border-bottom">
                                                        <td class="py-1">{{ $bill->payroll_employee->financing_payment->description }}</td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">1</span></td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($bill->payroll_employee->financing_payment->amount, 2, '.', ',') }}</span></td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">- {{ number_format($bill->payroll_employee->financing_payment->amount, 2, '.', ',') }}</span></td>
                                                    </tr>
                                                @endif
                                            @else
                                                @foreach ($bill->details as $detail)
                                                    <tr class="border-bottom">
                                                        <td class="py-1">{{ $detail->description }}</td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">{{ $detail->units }}</span></td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($detail->price, 2, '.', ',') }}</span></td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($detail->price * $detail->units, 2, '.', ',') }}</span></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body invoice-padding pt-1 pb-1">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-12 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper" style="max-width: 20rem !important;">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">TOTAL FACTURA:</p>
                                                    <p class="invoice-total-amount">{{ number_format($bill->amount, 2, '.', ',') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($bill->type == 'C')
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">PAGOS ABONADOS</th>
                                                </tr>
                                                <tr>
                                                    <th class="py-1">Fecha</th>
                                                    <th class="py-1">Descripción</th>
                                                    <th class="py-1">Estado</th>
                                                    <th class="py-1 text-center">Monto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($bill->payments->count() > 0)
                                                    @foreach ($bill->payments as $payment)
                                                        <tr class="border-bottom">
                                                            <td class="py-1">{{ date('d-m-Y', strtotime($payment->created_at)) }}</td>
                                                            @if (!is_null($payment->discount_amount))
                                                                <td class="py-1">DESCUENTO #{{ $payment->id }}</td>
                                                            @else
                                                                <td class="py-1">PAGO #{{ $payment->id }}</td>
                                                            @endif
                                                            <td class="py-1">
                                                                @if ($payment->status == 0)
                                                                    <span class="alert alert-info">Pendiente</span>
                                                                @elseif ($payment->status == 1)
                                                                    <span class="alert alert-success">Aprobado</span>
                                                                @else
                                                                    <span class="alert alert-danger" >Rechazado</span>
                                                                @endif
                                                            </td>
                                                            <td class="py-1 text-center"><span class="font-weight-bold">
                                                                - {{ number_format($payment->total, 2, '.', ',') }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="card-body invoice-padding pt-1 pb-1">
                                        <div class="row invoice-sales-total-wrapper">
                                            <div class="col-md-12 d-flex justify-content-end order-md-2 order-1">
                                                <div class="invoice-total-wrapper" style="max-width: 20rem !important;">
                                                    <div class="invoice-total-item">
                                                        <p class="invoice-total-title">TOTAL POR PAGAR:</p>
                                                        <p class="invoice-total-amount" style="margin-right: 35px;">{{ number_format($bill->remaining, 2, '.', ',') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Sección de Botones --}}
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body p-2">
                                    <button class="btn btn-info btn-block mb-75" data-toggle="modal" data-target="#send-invoice">
                                        <i class="fa fa-envelope"></i> Enviar Factura
                                    </button>
                                    <a class="btn btn-primary btn-block btn-download-invoice mb-75" href="{{ route('admin.bills.download', $bill->id) }}" target="_blank">
                                        <i class="fas fa-download"></i> Descargar
                                    </a>
                                    @if ($bill->status != '1')
                                        @if ($bill->type == 'E')
                                            <button class="btn btn-success btn-block" data-toggle="modal" data-target="#add-payment">
                                                <i class="fas fa-donate"></i> Agregar Hash
                                            </button>
                                        @else
                                            <button class="btn btn-success btn-block" data-toggle="modal" data-target="#add-payment">
                                                <i class="fas fa-donate"></i> Agregar Pago
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    {{-- Modal para Enviar Factura al correo --}}
    <div class="modal fade" id="send-invoice" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-0">
                <div class="modal-header mb-1">
                    <h5 class="modal-title">
                        <span class="align-middle">Enviar Factura</span>
                    </h5>
                </div>
                <form method="POST" action="{{ route('admin.bills.send') }}">
                    @csrf
                    <input type="hidden" name="bill_id" value="{{ $bill->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $bill->user->email }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="form-label">Asunto</label>
                            <input type="text" class="form-control" name="subject" id="subject" value="Factura Valdusoft #{{ $bill->id }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" name="message" id="message" cols="3" rows="5">
                                Nos complace enviarle la factura #{{ $bill->id }}...
                            </textarea>
                        </div>
                        <div class="form-group">
                            <span class="badge badge-light-primary">
                                <i class="fa fa-link mr-25"></i>
                                <span class="align-middle">Factura Adjuntada</span>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal para Agregar Pago --}}
    <div class="modal fade" id="add-payment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-0">
                <div class="modal-header mb-1">
                    <h5 class="modal-title">
                        <span class="align-middle">Agregar Pago</span>
                    </h5>
                </div>
                <form method="POST" action="{{ route('admin.payments.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="bill_id" value="{{ $bill->id }}">
                    <input type="hidden" name="user_id" value="{{ is_null($bill->user_id) ? 0 : $bill->user_id }}" >
                    @if ($bill->type == 'E')
                        <input type="hidden" name="payment_method" value="Crypto">
                        <input type="hidden" name="account" value="{{ $bill->user->tron_wallet }}">
                        <input type="hidden" name="amount" value="{{ $bill->amount }}">

                        <div class="modal-body flex-grow-1">
                            <div class="form-group">
                                <label class="form-label" for="payment_id">Hash del Pago</label>
                                <input type="text" class="form-control" name="payment_id" id="payment_id" required/>
                            </div>
                        </div>
                    @else
                        <div class="modal-body flex-grow-1">
                            <div class="form-group">
                                <input id="balance" class="form-control" type="text" value="Balance de Factura: {{ number_format($bill->remaining, 2, '.', ',') }}" disabled />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="payment_type">Tipo de Pago</label>
                                <select class="form-control" id="payment_type" name="payment_type" onchange="loadDiv();">
                                    <option value="Abono" selected>Abono</option>
                                    <option value="Descuento">Descuento</option>
                                </select>
                            </div>
                            <div id="payment_div">
                                <div class="form-group">
                                    <label class="form-label" for="amount">Monto</label>
                                    <input type="text" class="form-control" name="amount" id="amount" required/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="payment_method">Método de Pago</label>
                                    <select class="form-control" id="payment_method" name="payment_method" onchange="loadSupportDiv();" required>
                                        <option value="" selected disabled>Seleccione el método de pago...</option>
                                        <option value="Crypto">Criptomoneda</option>
                                        <option value="Bancolombia">Bancolombia</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="payment_id">Hash / Referencia</label>
                                    <input type="text" class="form-control" name="payment_id" id="payment_id" required />
                                </div>
                                <div class="form-group">
                                    <label for="fee">Fee</label>
                                    <input type="text" class="form-control" name="fee" id="fee" required>
                                </div>
                                <div class="custom-file hidden" id="support_div">
                                    <label class="custom-file-label" for="support"><b>Clic para seleccionar una imagen</b></label>
                                    <input type="file" name="support" id="support" class="custom-file-input" accept="image/*" onchange="previewFile(this, 'photo_preview')">
                               </div>
                            </div>

                            <div class="hidden" id="discount_div">
                                <div class="form-group">
                                    <label class="form-label" for="discount_description">Concepto del Descuento</label>
                                    <input type="text" class="form-control" name="discount_description" id="discount_description" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="discount">Monto a Descontar</label>
                                    <input type="text" class="form-control" name="discount_amount" id="discount_amount" />
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">@if ($bill->type == 'E') Cargar Hash @else Cargar Pago @endif</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
