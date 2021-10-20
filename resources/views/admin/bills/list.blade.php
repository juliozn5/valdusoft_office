@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click"
data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('custom_css')
   
<style>
    .modal-body {
        padding: 1rem;
    }

</style>

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
                        <ul class="nav nav-pills ">
                            <li>
                                <a class="nav-link nav-link-pills active" data-toggle="tab" href="#attachments"
                                    id="empleado" onclick="ocultar()"><strong>
                                        EMPLEADOS
                                    </strong></a>
                            </li>
                            <li>
                                <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#chat" id="mostrar"
                                    onClick="mostrar('generar')"><strong> CLIENTES
                                    </strong></a>
                            </li>
                            <li>
                                <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#accountant"
                                    id="mostrar" onClick="mostrar('generar')"><strong> HOSTING </strong></a>
                            </li>
                        </ul>
                        <a href="#prestamo" data-toggle="modal" class="btn1 btn btn-primary mb-2 waves-effect"
                            id="generar"> GENERAR</a>
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
                                        @foreach ($employer as $employe)
                                        <tr>
                                            <th scope="row">#{{ $employe->id }}</th>
                                            <td>{{ $employe->user->name }}</td>
                                            <td>{{ $employe->date }}</td>
                                            <td>{{ $employe->amount }}$</td>
                                            <td>
                                                @if ($employe->status == 0)
                                                <label class="label status-label status-label-purple">No
                                                    Atendido</label>
                                                @elseif ($employe->status == 1)
                                                <label class="label status-label status-label-gray">En
                                                    Proceso</label>
                                                @elseif ($employe->status == 2)
                                                <label class="label status-label status-label-blue">Testiando</label>
                                                @elseif ($employe->status == 3)
                                                <label class="label status-label status-label-green">Completado</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.bills.BillList')}}"><i
                                                        class="fa fa-eye mr-1 action-icon"></i></a>
                                            </td>
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
                                                <input type="text" name="descripcion[]" class="one form-control col-2" id="first">
                                                <input type="number" name="unidades[]" class="two form-control col-2" id="second" oninput="calculate()">
                                                <input type="number" name="valor[]" class="three form-control col-2" id="third" oninput="calculate()">
                                                <input type="text" name="precio[]" class="four form-control col-2" id="fourth" readonly>
                                            </div>
                                        </div>
                                        <!--FOOTER DEL MODAL-->
                                        <div class="modal-footer">
                                            <ul class="list-group list-group-flush">

                                                <li class="list-group-item">TOTAL PARCIAL: <br> <span class="font-weight-bolder" id="tp"></span></li>
                                                <li class="list-group-item">DESCUENTO: <br> <input name="descuento" oninput="calculate()" class="form-control" size="4" id="d"></li>
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

@push('custom_js')
<script>

/* función para calculate el valor de las unidades */
function calculate() {

    second = $("#second").val();
    third = $("#third").val();
    fourth = $("#fourth").val(second * third);

    subtotal = $('#tp').text((second * third) + '$');

    discount = $("#d").val();
    $('#p').text( (second * third - discount) + '$' )
}

/*This function generates and removes entries, the index of this function is in admin / bill / list*/
max_fields = 100;
x = 1;

$('#add_field').click(function (e) {
    e.preventDefault(); //Pervenir Nuevos Click
    if (x < max_fields) {
        $('#listas').append('<div id="listas">\
        <div class="row mt-4">\
        <input type="text" name="descripcion[]" class="one form-control col-2" id="principal_' + x + '">\
        <input type="text" id="second_' + x + '" name="unidades[]" oninput="calculate(' + x + ')" class="two monto form-control col-2" >\
        <input type="text" id="third_' + x + '" name="valor[]" oninput="calculate(' + x + ')"  class="three monto form-control col-2" >\
        <input name="precio[]" class="four form-control col-2" id="fourth_' + x + '">\
        <a href="#" class="remover_campo ml-2"><i class="fas fa-times"></i></a>\
        </div>');
        x++;
    }
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


    //OCULTAR BOTON DE GENERAR
    // function ocultar() {
    //     document.getElementById('generar').style.display = 'none';
    // }

    //MOSTRAR BOTON DE GENERAR 

    // function mostrar() {
    //     document.getElementById('generar').style.display = 'block';
    // }


</script>

@endpush