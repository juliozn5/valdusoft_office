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
        function showBtn($option) {
            if ($option == 'E'){
                $("#generate-btn").addClass("hidden");
            }else{
                $("#generate-btn").removeClass("hidden");
            }
        }
    /* función para calculate el valor de las unidades */
    function calculate(id) {

        fourt = $("#fourth_"+id).val();

        console.log(fourt);

        second = $("#second_"+id).val();
        third = $("#third_"+id).val();
        fourth = $("#fourth_"+id).val(second * third);

        subtotal = $('#tp').text((second * third) + '$');

        discount = $("#d").val();

        paid_out = $('#p').text( (second * third - discount) + '$' )

    }   

    /*This function generates and removes entries, the index of this function is in admin / bill / list*/
    max_fields = 100;
    x = 1;

    $('#add_field').click(function (e) {
        e.preventDefault(); //Pervenir Nuevos Click
        if (x < max_fields) { 
            $('#listas').append('<div class="row mt-2">\
            <input type="text" name="descripcion[]" class="one form-control col-2" id="first_'+x+'">\
            <input type="number" name="unidades[]" class="two form-control col-2" id="second_'+x+'" oninput="calculate('+x+')">\
            <input type="number" name="valor[]" class="three form-control col-2" id="third_'+x+'" oninput="calculate('+x+')">\
            <input type="number" name="precio[]" class="four form-control col-2" id="fourth_'+x+'" readonly>\
            <a href="#" class="remover_campo ml-2"><i class="fas fa-times"></i></a>\
            </div>');
            x++;

        }
        // calculate(x)
    });

    // Remover Grupo de div
    $('#listas').on("click", ".remover_campo", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });

    /*This function changes the value of the "Value of the hour" and then that will be the cost of the hour*/

    // const elemNombre = document.getElementById("nombre"),
    //     elemValorNombre = document.getElementById("valor_nombre");

    // function cambio(evento) {
    //     let cambio = elemNombre.value;
    //     elemValorNombre.innerText = cambio;
    // }

    // elemNombre.addEventListener('input', cambio);
    </script>
@endpush

@section('content')
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
                            <a href="#prestamo" data-toggle="modal" class="btn1 btn btn-primary mb-2 waves-effect hidden"
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
                                                    <td>{{ $employee->amount }}$</td>
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
                                                <th>MONTO</th>
                                                <th>ESTADO</th>
                                                <th class="col-3">ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($client as $client)
                                            <tr>
                                                <th scope="row">#{{ $client->id }}</th>
                                                <td>{{ $client->user->name }}</td>
                                                <td>{{ $client->date }}</td>
                                                <td>{{ $client->amount }}$</td>
                                                <td>
                                                    @if ($client->status == 0)
                                                    <label class="label status-label status-label-purple">No
                                                        Atendido</label>
                                                    @elseif ($client->status == 1)
                                                    <label class="label status-label status-label-gray">En
                                                        Proceso</label>
                                                    @elseif ($client->status == 2)
                                                    <label class="label status-label status-label-blue">Testiando</label>
                                                    @elseif ($client->status == 3)
                                                    <label class="label status-label status-label-green">Completado</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.bills.BillList')}}"><i
                                                            class="fa fa-eye mr-1 action-icon"></i></a>
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
                                            @foreach ($hosting as $hosting)
                                            <tr>
                                                <th scope="row">#{{ $hosting->id }}</th>
                                                <td>{{ $hosting->user->name }}</td>
                                                <td>{{ $hosting->date }}</td>
                                                <td>{{ $hosting->amount }}$</td>
                                                <td>
                                                    @if ($hosting->status == 0)
                                                    <label class="label status-label status-label-purple">No
                                                        Atendido</label>
                                                    @elseif ($hosting->status == 1)
                                                    <label class="label status-label status-label-gray">En
                                                        Proceso</label>
                                                    @elseif ($hosting->status == 2)
                                                    <label class="label status-label status-label-blue">Testiando</label>
                                                    @elseif ($hosting->status == 3)
                                                    <label class="label status-label status-label-green">Completado</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.bills.BillList')}}"><i
                                                            class="fa fa-eye mr-1 action-icon"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!--  MODAL DEL CLIENTE  Y HOSTING -->
                        <div class="modal fade" id="prestamo" aria-hidden="true" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Generar
                                                Factura</strong></h5>
                                        <button class="close" style="margin-right:10px; margin-top:1px;"
                                            data-dismiss="modal">&times;</button>
                                    </div>

                                    <!--BODY DEL MODAL-->
                                    <div class="modal-body">

                                        <table class="table">
                                            <thead class="thead-light text-center">
                                                <th class="col-2">DESCRIPCIÓN</th>
                                                <th class="col-3">UNIDADES</th>
                                                <th class="col-3">PRECIO UNITARIO</th>
                                                <th class="" style="margin-right:15px;">PRECIO</th>
                                            </thead>
                                        </table>
                                        <form action="{{ route('admin.bills.post')}}" method="post">
                                            @csrf
                                            <div id="listas">
                                                <div class="row mt-2">
                                                    {{-- <select name="user_id" id="user_id" class="form-control" required>
                                                        <option value="" selected disabled>Seleccione un cliente...</option>
                                                        @foreach ($user_client as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }} {{ $item->last_name }}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <input type="text" name="descripcion[]" class="one form-control col-2" id="first_0">
                                                    <input type="number" name="unidades[]" class="two form-control col-2" id="second_0" oninput="calculate(0)">
                                                    <input type="number" name="valor[]" class="three form-control col-2" id="third_0" oninput="calculate(0)">
                                                    <input type="number" name="precio[]" class="four form-control col-2" id="fourth_0" readonly>
                                                </div>
                                            </div>
                                            <!--FOOTER DEL MODAL-->
                                            <div class="modal-footer">
                                                <ul class="list-group list-group-flush">

                                                    <li class="list-group-item">TOTAL PARCIAL: <br> <span class="font-weight-bolder" id="tp"></span></li>
                                                    <li class="list-group-item">DESCUENTO: <br> <input name="descuento" oninput="calculate(0)" class="form-control" size="4" id="d"></li>
                                                    <li class="list-group-item">PAGADO: <br> <span class="font-weight-bolder" id="p"></span></li>
                                                </ul>
                                            </div>
                                            <button type="submit" id="botom"
                                                class="btn btn-primary  waves-effect waves-light mb-2 mr-2 mb-3"><strong>Guardar</strong></button>

                                            <a id="add_field"><img class="rounded-circle ml-2"
                                                    src="{{ asset('images/icons/plus-circle.png') }}" height="40"
                                                    width="40">
                                                <span class="ml-1" style="font-weight: bold;">Agregar otra fila</span></a>

                                        </form> 

                                    </div> 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection