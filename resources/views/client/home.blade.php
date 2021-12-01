@extends('layouts.app')

@push('body-atribute')
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

{{--@push('scripts')
    function renewalHosting(item) {
        $("#hosting_id").val(item.id);        
        $("#user_id").val(item.user_id);        
    }
@endpush --}}

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body mb-5 mt-2">
                {{-- Sección de Proyectos --}}
                <div class="card">
                    <h3 class="card-title mb-2 pt-2" style="padding: 5px">Proyectos</h3>
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

                {{-- Sección de Facturas --}}
                <div class="card">
                    <h3 class="card-title mb-2 pt-2" style="padding: 5px">Facturas</h3>
                    <div class="table-responsive ">
                        <table class="table">
                            <thead class="thead-light ">
                                <th class="">FECHA</th>
                                <th class="text-center">ESTADO</th>
                                <th class="text-center">MONTO</th>
                                <th class="text-center">ACCION</th>
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
                                            @elseif ($client->status == 2)
                                                <label class="label status-label status-label-blue  ">Parcialmente pagada</label>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $client->amount }}$</td>
                                        <td class="text-center">
                                            <a href="{{ route('client.bills.show', $client->id) }}"><i class="fas fa-eye action-icon"></i></a>
                                            <a href="{{ route('client.bills.download', $client->id) }}" target="_blank"><i class="fas fa-download action-icon ml-1"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Sección de Hostings --}}
                <div class="card"> 
                    <h3 class="card-title">Hostings y Dominios</h3>
                    <div class="card-body">
                        <div class="card">
                            <div class="row">
                                @foreach ($hostings as $hosting)
                                    <div class="col-6 card mt-3" style="height:150px;">
                                        <div class="card-body rounded" style="background: #252856;margin-left:1px;">
                                            <div class="mt-2" style="margin-left: 10px;">
                                                <img class="float-right mr-2 mt-2" src="{{asset('images/icons/background.png')}}" alt="">
                                                <h5 class="card-title text-white mt-1" style="padding-left: 1px;">{{$hosting->url}}</h5>
                                                <br>
                                                <p class="card-text h5 text-white ">Fecha de Vencimiento</p>
                                                <p class="h4 mt-1 text-white"><i class="fa fa-calendar icon-big mr-1 mb-1"></i>{{ date('d/m/Y', strtotime($hosting->due_date)) }}</p>
                                            </div>
                                            <div class="row mb-1" >
                                                <div class="col-md-6 text-right">
                                                    <a type="button" class="btn btn-hos_show center" style="background-color:#FF4D00;color: white;" href="{{$hosting->cpanel_url}}" target="_blank"><img src="{{asset('images/valdusoft/admin.png')}}" alt="" class="mr-1">Ir al Cpanel</a>
                                                </div>
                                                <div class="col-md-6 text-left">
                                                    <a href="{{route('client.hosting.showHosting', $hosting)}}" type="button" class="btn btn-green" style="background-color: #06B054;color: white;"><img src="{{ asset('images/valdusoft/refresh.png') }}" alt="" class="mr-1">Renovar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            
@endsection

