@extends('layouts.app')

@push('body-atribute')
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('custom_css')
    <style>
        .modal-body {
            padding: 1rem;
        }

    </style>
@endpush

@push('custom_js')
    <script>
        numRows = 1;

        function showBtn($option) {
            if ($option == 'E'){
                $("#generate-btn").addClass("hidden");
            }else{
                $("#generate-btn").removeClass("hidden");
                if ($option == 'C'){
                    $("#select_hostings").addClass("hidden");
                    $("#select_clients").removeClass("hidden");
                    $("#select_projects").removeClass("hidden");
                    $("#client_id").attr("required", true);
                    $("#project_id").attr("required", true);
                    $("#hosting_id").attr("required", false);
                }else{
                    $("#select_hostings").removeClass("hidden");
                    $("#select_clients").addClass("hidden");
                    $("#select_projects").addClass("hidden");
                    $("#client_id").attr("required", false);
                    $("#project_id").attr("required", false);
                    $("#hosting_id").attr("required", true);
                }
            }
        }

        function loadProjects(){
            var route = 'http://localhost:8000/admin/projects/client-list/'+$("#client_id").val();
            //var route = 'https://valdusoft.com/admin/projects/client-list/'+$("#client_id").val();
            $.ajax({
                url: route,
                type: "GET",
                success:function(ans){
                    $("#project_id").html("");
                    $("#project_id").append("<option value='' selected disabled>Seleccione una opción...</option>");
                    for (var i = 0; i < ans.length; i++){
                        $("#project_id").append("<option value="+ans[i].id+">"+ans[i].name+"</option>");
                    }
                }
            });
        }

        function addRow(){
            numRows++;         
            let content = '<tr id="row_'+numRows+'">\
                <td><input type="text" name="description[]" class="form-control description" id="description_'+numRows+'" required></td>\
                <td><input type="number" name="unit[]" class="form-control units" id="unit_'+numRows+'" value="1" oninput="calculate('+numRows+')" required></td>\
                <td><input type="text" name="price[]" class="form-control price" id="price_'+numRows+'" value="0" oninput="calculate('+numRows+')" required></td>\
                <td><input type="text" name="total[]" class="form-control total" id="total_'+numRows+'" value="0" readonly></td>\
                <td><a href="javascript:;" onclick="deleteRow('+numRows+')"><img class="rounded-circle ml-2" src="{{ asset('images/svg/x-circle.svg') }}" height="30" width="30"></a></td>\
                </tr>';
            
            $("#items_table>tbody").append(content);
        }

        function deleteRow(row){
            $("#row_"+row).remove();
            numRows--;
        }

        function calculate(row){
            let unit = $("#unit_"+row).val();
            let price = $("#price_"+row).val();

            $("#total_"+row).val(parseInt(unit) * parseFloat(price));

            var total = 0;
            for (var i = 1; i <= numRows; i++){
                total += parseFloat($("#total_"+i).val());
            }

            $("#partial_total").val(total);
        }
    </script>
@endpush

@section('content')
    @if (Session::has('msj-store'))
        <script>
            $(document).ready(function() {
                toastr.success('La factura ha sido generada con éxito.', 'Operación Completada');
            });
        </script>
    @endif

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div id="table-head">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills">
                                <li>
                                    <a class="nav-link nav-link-pills active" data-toggle="tab" href="#attachments"
                                        id="empleado" onclick="showBtn('E')"><strong>
                                            EMPLEADOS
                                        </strong></a>
                                </li>
                                <li>
                                    <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#chat" id="mostrar"
                                        onClick="showBtn('C')"><strong> CLIENTES
                                        </strong></a>
                                </li>
                                <li>
                                    <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#accountant"
                                        id="mostrar" onClick="showBtn('H')"><strong> HOSTING </strong></a>
                                </li>
                            </ul>
                            <a href="#addBill" data-toggle="modal" class="btn1 btn btn-primary mb-2 waves-effect hidden"
                                id="generate-btn"> GENERAR</a>
                        </div>

                        <div class="tab-content">
                            <!-- Pestaña de Empleado -->
                            <div class="tab-pane active " id="attachments">
                                <div class="table-responsive mt-1">
                                    <table class="table mb-0">
                                        <thead class="thead-light text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>NOMBRE</th>
                                                <th>FECHA</th>
                                                <th>MONTO</th>
                                                <th>ESTADO</th>
                                                <th class="col-3">ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($employee_bills as $employee)
                                                <tr>
                                                    <th scope="row">#{{ $employee->id }}</th>
                                                    <td>{{ $employee->user->name }} {{ $employee->user->last_name }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($employee->date)) }}</td>
                                                    <td>{{ number_format($employee->amount, 2, '.', ',') }}</td>
                                                    <td>
                                                        @if ($employee->status == 0)
                                                            <label class="label status-label status-label-purple">Pendiente</label>
                                                        @else
                                                            <label class="label status-label status-label-green">Pagada</label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.bills.show', $employee->id)}}">
                                                            <i class="fa fa-eye mr-1 action-icon"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Pestaña de Cliente -->
                            <div class="tab-pane fade" id="chat">
                                <div class="table-responsive mt-1">
                                    <table class="table mb-0">
                                        <thead class="thead-light text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>NOMBRE</th>
                                                <th>FECHA</th>
                                                <th>TOTAL</th>
                                                <th>ABONADO</th>
                                                <th>ESTADO</th>
                                                <th class="col-3">ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($client_bills as $client)
                                            <tr>
                                                <th scope="row">#{{ $client->id }}</th>
                                                <td>{{ $client->user->name }} {{ $client->user->last_name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($client->date)) }}</td>
                                                <td>{{ number_format($client->amount, 2, '.', ',') }}</td>
                                                <td>{{ number_format($client->paid_amount, 2, '.', ',') }}</td>
                                                <td>
                                                    @if ($client->status == 0)
                                                        <label class="label status-label status-label-purple">Pendiente</label>
                                                    @else
                                                        <label class="label status-label status-label-green">Completado</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.bills.show', $client->id)}}">
                                                        <i class="fa fa-eye mr-1 action-icon"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Pestaña de Hosting -->
                            <div class="tab-pane fade" id="accountant">
                                <div class="table-responsive mt-1">
                                    <table class="table mb-0">
                                        <thead class="thead-light text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>NOMBRE</th>
                                                <th>FECHA</th>
                                                <th>MONTO</th>
                                                <th>ESTADO</th>
                                                <th class="col-3">ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($hosting_bills as $hosting)
                                            <tr>
                                                <th scope="row">#{{ $hosting->id }}</th>
                                                <td>{{ $hosting->hosting->url }}</td>
                                                <td>{{ date('d-m-Y', strtotime($hosting->date)) }}</td>
                                                <td>{{ number_format($hosting->amount, 2, '.', ',') }}</td>
                                                <td>
                                                    @if ($hosting->status == 0)
                                                        <label class="label status-label status-label-purple">Pendiente</label>
                                                    @else
                                                        <label class="label status-label status-label-green">Completado</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.bills.show', $hosting->id)}}">
                                                        <i class="fa fa-eye mr-1 action-icon"></i>
                                                    </a>
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

    {{-- MODAL PARA CREAR FACTURA DEL CLIENTE O HOSTING --}} 
    <div class="modal fade" id="addBill" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Generar
                            Factura</strong></h5>
                    <button class="close" style="margin-right:10px; margin-top:1px;"
                        data-dismiss="modal">&times;</button>
                </div>

                <form action="{{ route('admin.bills.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group" id="select_clients">
                            <label for="client_id">Seleccione un cliente</label>
                            <select class="form-control" name="client_id" id="client_id" onchange="loadProjects();" required>
                                <option value="" selected disabled>Seleccione una opción...</option>
                                @foreach ($clients as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }} {{ $c->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="select_projects">
                            <label for="project_id">Seleccione un proyecto...</label>
                            <select class="form-control" name="project_id" id="project_id" required>
                                <option value="" selected disabled>Seleccione una opción...</option>
                            </select>
                        </div>

                        <div class="form-group hidden" id="select_hostings">
                            <label for="hosting_id">Seleccione un hosting</label>
                            <select class="form-control" name="hosting_id" id="hosting_id">
                                <option value="" selected disabled>Seleccione una opción...</option>
                                @foreach ($hostings as $h)
                                    <option value="{{ $h->id }}">{{ $h->url }}</option>
                                @endforeach
                            </select>
                        </div>

                        <table class="table" id="items_table">
                            <thead class="thead-light text-center">
                                <th class="col-5">DESCRIPCIÓN</th>
                                <th class="col-2">UNIDADES</th>
                                <th class="col-2">P. UNITARIO</th>
                                <th class="col-2">TOTAL</th>
                                <th class="col-1"></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="description[]" class="form-control" id="description_1" required></td>
                                    <td><input type="number" name="unit[]" class="form-control" id="unit_1" value="1" oninput="calculate(1)" required></td>
                                    <td><input type="text" name="price[]" class="form-control" id="price_1" value="0" oninput="calculate(1)" required></td>
                                    <td><input type="text" name="total[]" class="form-control" id="total_1" value="0" readonly></td>
                                    <td>
                                        <a href="javascript:;" onclick="addRow();"><img class="rounded-circle ml-2" src="{{ asset('images/svg/plus-circle.svg') }}" height="30" width="30"></a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr style="font-weight: bold; font-size: 14px;">
                                    <td style="border-top: none !important;"></td>
                                    <td colspan="2" class="text-right">TOTAL PARCIAL</td>
                                    <td colspan="2" class="text-right" style="padding-right: 20px;"><input type="text" class="form-control" name="partial_total" id="partial_total" value="0.00" style="border: none !important; font-size: 14px !important;" readonly></td>
                                </tr>
                                <tr style="font-weight: bold; font-size: 14px;">
                                    <td style="border-top: none !important;"></td>
                                    <td colspan="2" class="text-right">DESCUENTO</td>
                                    <td colspan="2" class="text-right"><input type="text" class="form-control" name="discount" id="discount" placeholder="0.00" style="border: none !important; font-size: 14px !important;"></td>
                                </tr>
                                <tr style="font-weight: bold; font-size: 14px;">
                                    <td style="border-top: none !important;"></td>
                                    <td colspan="2" class="text-right">PAGADO</td>
                                    <td colspan="2" class="text-right"><input type="text" class="form-control" name="payed" id="payed" placeholder="0.00" style="border: none !important; font-size: 14px !important;"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><strong>Guardar</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection