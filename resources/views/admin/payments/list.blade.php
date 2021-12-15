@extends('layouts.app')

@push('scripts')
    <script>
        function loadPayment(payment_id){
            $("#confirm_payment_id").val(payment_id);
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
    
        function previewPersistedFile(url, preview_id) {
            $("#" + preview_id).attr('src', url);
            $("#" + preview_id).css('height', '100px');
            $("#" + preview_id).parent().parent().removeClass('d-none');
        }
        function cancelPayment(payment_id){
            Swal.fire({
                title: 'Estás seguro?',
                text: "Esta acción no se puede revertir!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Rechazar Pago',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    $("#cancel_payment_id").val(payment_id);
                    $("#cancel_form").submit();
                }
            });
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

    @if (Session::has('msj-confirm'))
        <script>
            $(document).ready(function() {
                toastr.success('El pago ha sido confirmado con éxito.', 'Operación Completada');
            });
        </script>
    @endif

    @if (Session::has('msj-confirm'))
        <script>
            $(document).ready(function() {
                toastr.success('El pago ha sido rechazado con éxito.', 'Operación Completada');
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
            @if ($bills->count() > 0)
             @include('admin.payments.listBill')
            @endif
            <div class="content-body">
                <div class="row" id="table-head">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">
                                    @if (is_null($bill_id))
                                        Pagos
                                    @else
                                        Pagos de la Factura #{{ $bill_id }}
                                    @endif
                                </h3>
                                 <!-- @if ($bills->count() > 0)
                                    <a href="#" class="btn btn-primary  mb-2 waves-effect waves-light" data-toggle="modal" data-target="#ModalGenerate"><i class="feather icon-plus "></i>&nbsp; Agregar Nuevo</a>
                               
                                @endif -->
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <th>FECHA</th>
                                            <th>USUARIO</th>
                                            <th>ID DE FACTURA</th>
                                            <th>PLATAFORMA DE PAGO</th>
                                            <th style="width: 25%;">ID DE PAGO</th>
                                            <th class="text-center">MONTO</th>
                                            <th class="text-center">SOPORTE</th>
                                            <th class="text-center">ESTADO</th>
                                            <th class="text-center">ACCIÓN</th>
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
                                                    <td>
                                                        @if (!is_null($payment->payment_id))
                                                            {{ $payment->payment_id }}
                                                        @else
                                                            Descuento Administrativo ({{ $payment->discount_description }})
                                                        @endif 
                                                    </td>
                                                    <td class="text-center">{{ number_format($payment->total, 2, ',', '.') }}$</td>
                                                    <td class="text-center">
                                                        @if (!is_null($payment->support))
                                                            <a href="{{ asset('/uploads/images/payment-supports/'.$payment->support) }}" target="_blank">Ver</a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($payment->status == 0)
                                                            <label class="label status-label status-label-purple ">Pendiente</label>
                                                        @elseif ($payment->status == 1)
                                                            <label class="label status-label status-label-green">Completado</label>
                                                        @elseif ($payment->status == 2)
                                                            <label class="label status-label status-label-red">Rechazado</label>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.bills.download', $payment->bill_id) }}" target="_blank"><i class="far fa-eye action-icon"></i></a>
                                                        @if ($payment->status == 0)
                                                            <a href="#confirmPaymentModal" data-toggle="modal" onclick="loadPayment({{ $payment->id }});" title="Confirmar Pago"><i class="far fa-check-circle action-icon ml-1" style="color: green !important;"></i></a>
                                                            <a href="javascript:;" onclick="cancelPayment({{ $payment->id }});" title="Rechazar Pago"><i class="far fa-times-circle action-icon ml-1" style="color: red !important;"></i></a>  
                                                        @endif
                                                    </td>
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
    {{-- MODAL PARA AGREGAR NUEVO PAGO --}}
    <div class="modal fade" id="ModalGenerate" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                        <div class="form-group">
                            <label for="fee">Fee</label>
                            <input type="text" class="form-control" name="fee" id="fee" required>
                        </div>
                        <div class="custom-file hidden" id="support_div">
                            <label class="custom-file-label" for="support"><b>Clic para seleccionar una imagen</b></label>
                            <input type="file" name="support" id="support" class="custom-file-input" accept="image/*" onchange="previewFile(this, 'photo_preview')">
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
 

    {{-- MODAL PARA CONFIRMAR EL PAGO DE UNA FACTURA --}}
    <div class="modal fade" id="confirmPaymentModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mo" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-darck">Confirmar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.payments.confirm') }}" enctype="multipart/form-data" required >
                    @csrf
                    <input type="hidden" name="payment_id" id="confirm_payment_id">
                    <input type="hidden" name="action" value="confirm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fee">Fee</label>
                            <input type="text" class="form-control" name="fee" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Confirmar Pago</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <form action="{{ route('admin.payments.confirm') }}" method="POST" id="cancel_form">
        @csrf
        <input type="hidden" name="action" value="cancel">
        <input type="hidden" name="payment_id" id="cancel_payment_id">
    </form>


    {{-- MODAL PARA AGREGAR NUEVO PAGO --}}
    <div class="modal fade" id="ModalConfirm" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                        <div class="form-group">
                            <label for="fee">Fee</label>
                            <input type="text" class="form-control" name="fee" id="fee" required>
                        </div>
                        <div class="custom-file hidden" id="support_div">
                            <label class="custom-file-label" for="support"><b>Clic para seleccionar una imagen</b></label>
                            <input type="file" name="support" id="support" class="custom-file-input" accept="image/*" onchange="previewFile(this, 'photo_preview')">
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