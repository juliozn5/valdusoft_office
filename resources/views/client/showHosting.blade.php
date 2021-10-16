@extends('layouts.app')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <div class="h3 col-4 col-sm-6">Hosting:<a target="_blank" href="{{$hosting->url}}"> {{$hosting->url}}</a></div>
                    <div class="col-4 text-right pr-2">
                       <a type="button" class="btn btn-hos_show mr-1 center btn btn-primary" style="color: white;" href="{{route('client.hostings.list')}}">Atras</a>
                    </div>
                </div>
            </div>
            <div class="pl-2 pr-2">
                <div class="row mt-3 pl-2 pr-2">
                    <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Cliente</div>
                        <div class="mt-1 project-detail-dates">
                            <span>{{$hosting->user->name}} {{$hosting->user->last_name}}</span>
                        </div>     
                    </div>
                    <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Cantidad de años</div>
                        <div class="mt-1 project-detail-dates">
                            <span>{{$hosting->years}} Año</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-1"> 
                        <div class="project-detail-titles">Precio</div>
                        <div class="mt-1 project-detail-dates">
                            <span>{{$hosting->price}}</span>
                        </div>
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
                            <span>{{ date('d/m/Y', strtotime($hosting->due_date))}}</span>
                       </div> 
                    </div>
                    <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">precio de renovacion</div>
                        <div class="mt-1 project-detail-dates">
                            <span>{{$hosting->renewal_price}}</span>
                        </div>
                    </div>
               </div>
            </div>
            <div class="pl-2 pr-2 ">
                <div class="row mt-3 pl-2 pr-2">
                    <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Años de renovacion</div>
                        <div class="mt-1 project-detail-dates">
                            <span>{{$hosting->renewal_hosting}}</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Estado de Hosting</div>
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
                                    <span><strong>Usuarios: </strong><strong id="cpanel-email">{{$hosting->cpanel_email}}</strong></span>
                                    <i class="fa fa-copy fa-1x ml-1 text-info cursor-pointer" onclick="copiar('cpanel-email', this);"></i>
                                </div>
                                <div class="col-md-3">
                                    <span><strong>Contraseña: </strong><strong id="cpanel-password">{{$hosting->cpanel_password}}</strong></span>
                                    <i class="fa fa-copy fa-1x ml-1 text-info cursor-pointer" onclick="copiar('cpanel-password', this);"></i>
                                </div>
                                <div class="col-md-3">
                                    <span><strong>URL CPanel: </strong> <a target="_blank" href="{{$hosting->cpanel_url}}">{{$hosting->cpanel_url}}</a></span>
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