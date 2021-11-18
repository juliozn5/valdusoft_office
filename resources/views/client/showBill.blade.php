@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/app-assets/css/pages/app-invoice.css') }}">
@endpush

@push('scripts')
    <script>
        function loadSupportDiv(){
            if ($("#payment_method").val() == 'Crypto'){
                $("#support_div").addClass('hidden');
                $("#support").attr('required', false);
            }else{
                $("#support_div").removeClass('hidden');
                $("#support").attr('required', true);
            }
        }

        function previewFile(input, preview_id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#" + preview_id).attr('src', e.target.result);
                    $("#" + preview_id).css('height', '100px');
                    $("#" + preview_id).parent().parent().removeClass('d-none');
                }
                $("label[for='" + $(input).attr('id') + "']").text(input.files[0].name);
                reader.readAsDataURL(input.files[0]);
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
                                    <li class="breadcrumb-item"><a href="{{ route('client.home') }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Financiero</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('client.bills.list') }}">Facturas</a>
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
                                                <p class="invoice-date-title">Fecha:</p>
                                                <p class="invoice-date">{{ date('d-m-Y', strtotime($bill->date)) }}</p>
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
                                            <h6 class="mb-2">Cliente:</h6>
                                            <h6 class="mb-25">{{ $bill->user->name }} {{ $bill->user->last_name }}</h6>
                                            <p class="card-text mb-25">{{ $bill->user->phone }}</p>
                                            <p class="card-text mb-0">{{ $bill->user->email }}</p>
                                        </div>
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
                                            @foreach ($bill->details as $detail)
                                            <tr class="border-bottom">
                                                <td class="py-1">{{ $detail->description }}</td>
                                                <td class="py-1 text-center"><span class="font-weight-bold">{{ $detail->units }}</span></td>
                                                <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($detail->price, 2, '.', ',') }}</span></td>
                                                <td class="py-1 text-center"><span class="font-weight-bold">{{ number_format($detail->price * $detail->units, 2, '.', ',') }}</span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body invoice-padding pt-1 pb-1">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-12 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Total:</p>
                                                    <p class="invoice-total-amount">{{ number_format($bill->amount, 2, '.', ',') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                <th class="py-1 text-center">Total</th>
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
                                                                <span style="color: blue;">Pendiente</span>
                                                            @elseif ($payment->status == 1)
                                                                <span style="color: green;">Aprobado</span>
                                                            @else
                                                                <span style="color: red;">Rechazado</span>
                                                            @endif
                                                        </td>
                                                        <td class="py-1 text-center"><span class="font-weight-bold">- {{ number_format($payment->total, 2, '.', ',') }}</span></td>
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
                            </div>
                        </div>

                        {{-- Sección de Botones --}}
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body p-2">

                                    <a class="btn btn-primary btn-block btn-download-invoice mb-75" href="{{ route('admin.bills.download', $bill->id) }}" target="_blank">
                                        <i class="fas fa-download"></i> Descargar
                                    </a>
                                    @if ($bill->status == '0')
                                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#Add-payment">
                                        <i class="fas fa-donate"></i> Agregar Pago
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>

    {{-- Modal para Agregar Pago --}}
    <div class="modal fade" id="Add-payment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-0">
                <div class="modal-header mb-1">
                    <h5 class="modal-title">
                        <span class="align-middle">Agregar Pago</span>
                    </h5>
                </div>
                <form method="POST" action="{{ route('client.payments.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="bill_id" value="{{ $bill->id }}">
                    <input type="hidden" name="payment_type" value="Abono">
                    <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <input id="balance" class="form-control" type="text" value="Balance de Factura: {{ number_format($bill->amount, 2, '.', ',') }}" disabled />
                        </div>
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
                        <div class="custom-file hidden" id="support_div">
                            <label class="custom-file-label" for="support"><b>Clic para seleccionar una imagen</b></label>
                            <input type="file" name="support" id="support" class="custom-file-input" accept="image/*" onchange="previewFile(this, 'photo_preview')">
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cargar Pago</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection