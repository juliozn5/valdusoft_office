@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click"
data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body mb-5 mt-2">
            <div class="card">
                <h3 class="card-header mb-2">Proyectos</h3>
                <div class="container">
                    <div class="row">
                        @foreach ($projects as $item)
                        @if ($item->status != 4)
                        <div class="card container-fluid" style="width: 18rem;" id="recomiendo">

                            @if (!is_null($item->logo))
                            <img src="{{ asset('uploads/images/projects/'.$item->logo) }}" class="card-img-top" alt="...">

                            @else
                            <img class="card-img-top" src="{{ asset('/images/figma/recomiendo.png') }}">
                            @endif

                            <div class="card-body">
                                <div class="pr-1  h4 pb-2 text text-white" id="shadow">
                                    <div style="position: relative;top: 14px;" class="ml-1">{{$item->name}}</div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="">
                <h3 class="card-title mb-2 pt-2" style="padding: 5px">Facturas</h3>
                <div class="table-responsive ">
                    <table class="table">
                        <thead class="thead-light ">
                            <th class="">FECHA</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">ACCION</th>
                            <th class="text-center">MONTO</th>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td class="">{{ date('d-m-Y', strtotime($client->date ) )}}</td>
                                <td class="text-center">
                                    @if ($client->status == 0)
                                    <label class="label status-label status-label-purple">Pendiente</label>
                                    @elseif ($client->status == 1)
                                    <label class="label status-label status-label-gray">Pagada</label>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col "><a href="{{ route('client.bills.show', $client->id) }}"><i class="fas fa-eye"></i></a></div>
                                        <div class="col "><a href="{{ route('client.bills.download', $client->id) }}" target="_black"><i class="fas fa-download"></i></a></div>
                                </td>
                                <td class="text-center">{{ $client->amount }}$</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         
        <div class="content-body">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title mb-2">Hosting y Dominios</h3>
                    <div class="container mb-4 pb-2">
                        <div class="row">
                            @foreach ($hostings as $hosting)
                                  <div class="col-6 card " style="height:150px;">

                                <div class="card-body  rounded" id="position" style="background: #252856;margin-left:2px;">
                                    <div class="p-1">
                                        <img class="float-right mr-2 mt-2" src="{{asset('images/icons/background.png')}}" alt="">
                                        <h5 class="card-title text-white mt-1 ">{{$hosting->url}}</h5>
                                        <br>
                                        <p class="card-text h5 text-white ">Fecha de Vencimiento</p>

                                        <p class="h4 mt-1 text-white"><i class="fa fa-calendar icon-big mr-1 mb-1"></i>{{ date('d/m/Y', strtotime($hosting->due_date)) }}
                                        </p>
                                    </div>

                                    <div class="row mb-2" style="margin-left: 1px;">
                                        <div class="col-md-6">
                                            <a type="button" class="btn btn-hos_show  center" style="background-color:#FF4D00;color: white;" id="btn-guardar" href="{{$hosting->cpanel_url}}" target="_blank"><img src="{{asset('images/valdusoft/admin.png')}}" alt="" class="mr-1">Ir al Cpanel</a>
                                        </div>
                                        <div class="col-md-6 ">
                                            <a type="button" onclick="editBill({{$hosting->id}});" class="btn btn-green" style="background-color: #06B054;color: white;" data-toggle="modal" data-target="#modalRenovation" id="btn-guardar"><img src="{{ asset('images/valdusoft/refresh.png') }}" alt="" class="mr-1">Renovar</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalRenovation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Renovación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-center">Seleccione el método de pago</h4>
                                <div class="d-flex justify-content-center p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="billetera" onchange="javascript:showContent()">
                                        <label class="form-check-label" for="inlineRadio1">Billetera</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="bancolombia" onchange="javascript:showContent2()">
                                        <label class="form-check-label" for="inlineRadio2">Bancolombia</label>
                                    </div>
                                </div>

                                <form class="form form-vertical" action="{{ route('save-invoices') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="payment_type" name="payment_type">
                                    <input type="hidden" id="hosting_id" name="hosting_id">
                                    <input type="hidden" id="user_id" name="user_id">

                                    @include('client.partials.bancolombia')
                                    @include('client.partials.billetera')


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.clients.partials.js')
                @endsection
