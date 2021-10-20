@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

@include('layouts.partials.navbar')
@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important"><strong>Hostings</strong></div>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('client.home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('client.hostings.list') }}">Hostings</a></li>
                                <li class="breadcrumb-item">Detalle del Hosting</a></li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <div class="h3 col-md-4 col-sm-12"><a target="_blank" href="{{$hosting->url}}">{{$hosting->url}}</a></div>
                    <div>
                        <a type="button" class="btn btn-hos_show mr-1 center" style="background-color:#FF4D00;color: white;" id="btn-guardar" href="{{$hosting->cpanel_url}}" target="_blank"><img src="{{asset('images/valdusoft/admin.png')}}" alt="" class="mr-1">Ir al Cpanel</a>
                    </div>
                </div>
            </div>
            <div class="pl-2 pr-2">
                <div class="row mt-3 pl-2 pr-2">
                    <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Fecha de Inicio</div>
                        <div class="mt-1 project-detail-dates">
                            <img src="{{ asset('images/svg/calendar.svg')}}">
                            <span>{{ date('d/m/Y', strtotime($hosting->create_date))}}</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Fecha de Vencimiento</div>
                        <div class="mt-1 project-detail-dates">
                            <img src="{{ asset('images/svg/calendar.svg')}}">
                            {{-- <span>{{date('d/m/Y', $hosting->renewal_hosting)}}</span> --}}
                            <span>{{date('d/m/Y', strtotime($hosting->due_date))}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pl-2 pr-2 ">
                <div class="row mt-3 pl-2 pr-2">
                    <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Cantidad de años</div>
                        <div class="mt-1 project-detail-dates">
                            <span>{{($hosting->years <2) ? "$hosting->years Año" : "$hosting->years Años"}}</span>
                        </div>
                    </div>
                     <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Cliente</div>
                        <div class="mt-1 project-detail-dates">
                            <span>{{$hosting->user->name}} {{$hosting->user->last_name}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pl-2 pr-2 ">
                <div class="row mt-3 pl-2 pr-2">
                     <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Estado</div>
                        <div class="mt-1 project-detail-dates">
                            <span>
                             @if ($hosting->status == 0)
                               <label class="label status-label status-label-purple">Activo</label>
                             @elseif ($hosting->status == 1)
                               <label class="label status-label status-label-gray">Inactivo</label>
                             @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pl-2 pr-2  mb-3">
                <div class="row mt-3 pl-2 pr-2">
                    <div class="col-md-12 col-sm-1">
                        <div class="project-detail-titles">Integración con Cpanel</div>
                        <div class="mt-1 project-detail-dates">
                            <div class="row">
                                <div class="col-md-3">
                                    <span><strong>URL CPanel:</strong> <a target="_blank" href="{{$hosting->cpanel_url}}">{{$hosting->cpanel_url}}</a></span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <span><strong>Usuarios:</strong> <strong id="cpanel-email">{{$hosting->cpanel_email}}</strong></span>
                                    <i class="fa fa-copy fa-1x ml-1 text-info cursor-pointer" onclick="copiar('cpanel-email', this);"></i>
                                </div>
                                <div class="col-md-3">
                                    <span><strong>Contraseña:</strong> <strong id="cpanel-password">{{$hosting->cpanel_password}}</strong></span>
                                    <i class="fa fa-copy fa-1x ml-1 text-info cursor-pointer" onclick="copiar('cpanel-password', this);"></i>
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