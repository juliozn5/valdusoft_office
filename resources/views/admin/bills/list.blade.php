@extends('layouts.app')
@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click"
data-menu="vertical-menu-modern" data-col="2-columns"
@endpush
@section('content')
@include('layouts.partials.navbar')
@include('layouts.partials.sidebar')


<script>
    //OCULTAR BOTON DE GENERAR
    function ocultar() {
        document.getElementById('generar').style.display = 'none';
    }

    //MOSTRAR BOTON DE GENERAR 

    function mostrar() {
        document.getElementById('generar').style.display = 'block';
    }
</script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"> </div>
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Financiero</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.bills.list') }}">Financiero</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.bills.list') }}">Factura</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">

        <div id="table-head">
            <div class="col-11" style="margin-left:15px">
                <div class="card">
                    <div class="card-header">
                        <div class="d-grid gap-2 d-md-block mb-2 col-md-8 col-sm-1">
                            <ul class="nav nav-pills nav-justified">
                                <li class="">
                                    <a class="nav-link nav-link-pills active" data-toggle="tab" href="#attachments" id="empleado" onclick="ocultar()"><strong> EMPLEADOS </strong></a>
                                </li>
                                <li class="">
                                    <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#chat" id="mostrar" onClick="mostrar('generar')"><strong> CLIENTES </strong></a>
                                </li>
                                <li class="">
                                    <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#accountant" id="mostrar" onClick="mostrar('generar')"><strong> HOSTING </strong></a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-grid gap-2 d-md-block mb-2 col-4">
                            <a href="#prestamo" data-toggle="modal" class="btn1 btn btn-primary mb-2 waves-effect" style="margin-left:130px;" id="generar"> GENERAR</a>
                        </div>
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
                                                <label class="label status-label status-label-gray">En Proceso</label>
                                                @elseif ($employe->status == 2)
                                                <label class="label status-label status-label-blue">Testiando</label>
                                                @elseif ($employe->status == 3)
                                                <label class="label status-label status-label-green">Completado</label>
                                                @endif
                                            </td>
                                            <td><a href="{{route('admin.bills.BillList')}}"><i id="eye" style="font-size:15px;" class="far fa-eye"></i></a>
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
                                    <tbody class="text-center">
                                        @foreach ($client_bill as $client)
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
                                                <label class="label status-label status-label-gray">En Proceso</label>
                                                @elseif ($client->status == 2)
                                                <label class="label status-label status-label-blue">Testiando</label>
                                                @elseif ($client->status == 3)
                                                <label class="label status-label status-label-green">Completado</label>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{route('admin.bills.BillList')}}"><i class="fa fa-eye mr-1 action-icon"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mr-3">
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
                                                <label class="label status-label status-label-gray">En Proceso</label>
                                                @elseif ($hosting->status == 2)
                                                <label class="label status-label status-label-blue">Testiando</label>
                                                @elseif ($hosting->status == 3)
                                                <label class="label status-label status-label-green">Completado</label>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{route('admin.bills.BillList')}}"><i class="fa fa-eye mr-1 action-icon"></i></a>

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

                                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Generar Factura</strong></h5>
                                    <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>

                                </div>

                                <!--BODY DEL MODAL-->
                                <div class="modal-body">

                                    <table class="table">
                                        <thead class="thead-light text-center">
                                            <th class="col-2">DESCRIPCIÓN</th>
                                            <th class="col-3">UNIDADES</th>
                                            <th class="col-3">PRECIO UNITARIO</th>
                                            <th class="" style="margin-left:50px;">PRECIO</th>
                                        </thead>
                                    </table>


                                    <div class="input-group">
                                        <div class="text">
                                        </div>
                                        <input type="text" class="form-control col-2" id="principal">
                                        <input type="text" class="form-control col-2" id="segundo">
                                        <input type="text" class="form-control col-2" id="tercero">
                                        <input type="text" class="form-control col-2" id="cuarto">
                                    </div>



                                    <style>
                                        #cuarto {
                                            margin-left: 110px;
                                        }

                                        #tercero {
                                            margin-left: 45px;
                                        }

                                        #segundo {
                                            margin-left: 60px;
                                        }
                                    </style>


                                    <div class="col">
                                        <a href="#" class="float-right d-inline-block mt-2"><img class="rounded-circle" id="add_field" src="{{ asset('images/icons/plus-circle.png') }}" height="40" width="40">
                                    </div>


                                </div>

                                <!--FOOTER DEL MODAL-->
                                <div class="modal-footer">
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item"> <strong>TOTAL PARCIAL</strong> 00</li>
                                        <li class="list-group-item"><strong>DESCUENTO</strong> 00</li>
                                        <li class="list-group-item"><strong>PAGADO</strong> 00</li>
                                    </ul>
                                </div>
                                <button type="submit" class="btn btn-primary float-right waves-effect waves-light mb-2 mr-2"><strong>Guardar</strong></button>


                            </div>
                        </div>
                    </div>


                    @endsection




                    <script>
                        var campos_max = 10; //max de 10 campos

                        var x = 0;
                        $('#add_field').click(function(e) {
                            e.preventDefault(); //prevenir novos clicks
                            if (x < campos_max) {
                                $('#listas').append('<div>\
                        <input type="text" name="campo[]">\
                        <input type="text" name="campo[]">\
                        <input type="text" name="campo[]">\
                        <input type="text" name="campo[]">\
                        <a href="#" class="remover_campo">Remover</a>\
                        </div>');
                                x++;
                            }
                        });
                        // Remover o div anterior
                        $('#listas').on("click", ".remover_campo", function(e) {
                            e.preventDefault();
                            $(this).parent('div').remove();
                            x--;
                        });
                    </script>