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
                            <li class="breadcrumb-client"><a href="{{ route('admin.home') }}"><i
                                        class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-client"><a href="#">Financiero</a>
                            </li>
                            <li class="breadcrumb-client"><a href="#">Facturas</a>
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
                                    <a class="nav-link nav-link-pills active" data-toggle="tab" href="#attachments"
                                        id="empleado" onclick="ocultar()"><strong> EMPLEADOS </strong></a>
                                </li>
                                <li class="">
                                    <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#chat" id="mostrar"
                                        onClick="mostrar('generar')"><strong> CLIENTES </strong></a>
                                </li>
                                <li class="">
                                    <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#accountant"
                                        id="mostrar" onClick="mostrar('generar')"><strong> HOSTING </strong></a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-grid gap-2 d-md-block mb-2 col-4">
                            <a href="#prestamo" data-toggle="modal" class="btn1 btn btn-primary mb-2 waves-effect"
                                style="margin-left:130px;" id="generar"> GENERAR</a>
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
                                            <td><a href=""><img id="bottom"
                                                        src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
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
                                                <a href="#"><i class="fa fa-eye mr-1 action-icon"></i></a>

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
                                <div class="modal-body">

                                    <table class="table">
                                        <thead class="thead-light text-center">
                                            <th class="col-2">DESCRIPCIÓN</th>
                                            <th class="col-3">UNIDADES</th>
                                            <th class="col-3">PRECIO UNITARIO</th>
                                            <th class="" style="margin-left:50px;">PRECIO</th>
                                        </thead>
                                    </table>

                                    <div class="container ">
                                        <div class="row ">
                                            <div class="col ">
                                                <input class="col form-control" type="text">
                                            </div>
                                            <div class="col">
                                                <input class="col form-control" type="text" id="" style="margin-left :20px;">

                                            </div>
                                            <div class="col">
                                                <input class="col form-control" type="text" id="" style="margin-left:35px;">

                                            </div>
                                            <div class="col">
                                                <input class="col form-control" type="text" id="" style="margin-left:100px;">

                                            </div>
                                            <div class="col">

                                                <a href="#" class="float-right d-inline-block"><img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Tecnología" height="40" width="40">
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @endsection
