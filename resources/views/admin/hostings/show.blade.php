@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')
@push('scripts')
<script>
    function copiar(id_elemento, element) {
        console.log(element);
        element.classList.remove('text-info');
        element.classList.add('text-success');
        setTimeout(() => {
            element.classList.remove('text-success');
            element.classList.add('text-info');
        }, 2000);
        var aux = document.createElement("input");
        aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
    function edithosting($hosting) {
        $("#hosting_id").val($hosting.id);
        $("#hosting_url").val($hosting.url);
        $("#date").val($hosting.create_date);
        $("#client option[value=" + $hosting.user_id + "]").attr("selected", true);
        $("#date_end").val($hosting.years);
        $("#price").val($hosting.price);
        $("#renewal_price").val($hosting.renewal_price);
        $("#cpanel_url").val($hosting.cpanel_url);
        $("#cpanel_email").val($hosting.cpanel_email);
        $("#cpanel_password").val($hosting.cpanel_password);

    }

    function renovarhosting($hosting) {
        $("#renewal_hosting").val($hosting.renewal_hosting);
        $("#renewal_price2").val($hosting.renewal_price);
    }
</script>
@endpush
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.hostings.list') }}">Hostings</a></li>
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
                        <div class="btn btn-hos_show mr-1 center" style="background-color: #06B054;color: white;" href="#renovar" data-toggle="modal" onclick="renovarhosting({{$hosting}});"><img src="{{asset('images/valdusoft/refresh.png')}}" width="18px" alt="" style="margin-right:5px;">Renovar</div>
                        <div class="btn btn-hos_show btn-primary center" href="#edit" data-toggle="modal" onclick="edithosting({{$hosting}});"><img src="{{asset('images/valdusoft/Group.png')}}" alt="" style="margin-right:5px;">Editar</div>
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
</div>
</div>
</div>
</div>
</div>
<!--  MODAL EDITAR HOSTING  -->
<div class="modal  fade text-left " id="edit" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Editar Hosting</h5>
                <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('admin.hostings.update') }}" method="POST">
                @csrf
                <input type="hidden" name="hosting_id" id="hosting_id" value="{{$hosting->id}}">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="hosting_url"><strong>Dominio</strong></label>
                                <input name="hosting_url" id="hosting_url" class="form-control @error('hosting_url') is-invalid @enderror">
                                @error('hosting_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="date"><strong>Fecha</strong></label>
                                <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="client"><strong>Cliente</strong></label>
                                <select name="client" id="client" class="form-control @error('client') is-invalid @enderror">
                                    <option value="" selected disabled>Seleccione un cliente...</option>
                                    @foreach ($client as $item)
                                    <option value="{{ $item->id }}">{{ $item->name}} </option>
                                    @endforeach
                                </select>
                                @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="status"><strong>Estado</strong></label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="" selected disabled>Seleccione un estado...</option>
                                    <option value="0">Activo</option>
                                    <option value="1">Inactivo</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="date_end">Cantidad de años</label>
                                    <select name="date_end" id="date_end" class="form-control @error('date_end') is-invalid @enderror" required>
                                        <option value="" selected disabled>Seleccione los años para el hosting...</option>
                                        <option value="1" id="date_end">1 Año</option>
                                        <option value="2" id="date_end">2 Años</option>
                                        <option value="3" id="date_end">3 Años</option>
                                    </select>
                                    @error('date_end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="price"><strong>Precio</strong></label>
                                <input name="price" id="price" class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="renewal_price"><strong>Precio de Renovacion</strong></label>
                                <input name="renewal_price" id="renewal_price" class="form-control @error('renewal_price') is-invalid @enderror">
                                @error('renewal_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <hr> --}}
                        {{-- <div class="row">
                            <div class="col-sm-6">
                                <label for="cpanel_url"><strong>URL Cpanel</strong></label>
                                <input name="cpanel_url" id="cpanel_url" class="form-control @error('cpanel_url') is-invalid @enderror">
                                @error('cpanel_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="cpanel_email"><strong>Email Cpanel</strong></label>
                                <input name="cpanel_email" id="cpanel_email" class="form-control @error('cpanel_email') is-invalid @enderror">
                                @error('cpanel_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mt-1 mx-auto">
                                <label for="cpanel_password"><strong>Password Cpanel</strong></label>
                                <input name="cpanel_password" id="cpanel_password" class="form-control @error('cpanel_password') is-invalid @enderror">
                                @error('cpanel_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                    </div>
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--  MODAL RENOVAR HOSTING  -->
<div class="modal  fade text-left " id="renovar" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Renovar Hosting</h5>
                <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('admin.hostings.renewal') }}" method="POST">
                @csrf
                <input type="hidden" name="hosting_id" id="hosting_id" value="{{$hosting->id}}">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="renewal_hosting">Cantidad de la renovacion</label>
                                    <select name="renewal_hosting" id="renewal_hosting" class="form-control" required>
                                        <option value="" selected disabled>Seleccione los años para la renovacion...</option>
                                        <option value="1">1 Año</option>
                                        <option value="2">2 Años</option>
                                        <option value="3">3 Anos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="renewal_price2"><strong>Precio de Renovacion</strong></label>
                                <input name="renewal_price" id="renewal_price2" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection