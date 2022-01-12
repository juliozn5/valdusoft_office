@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click"
data-menu="vertical-menu-modern" data-col="2-columns"
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
        $("#cpanel_url").val($hosting.cpanel_url);
        $("#cpanel_email").val($hosting.cpanel_email);
        $("#cpanel_password").val($hosting.cpanel_password);

    }

    function renovarhosting($hosting) {
        $("#years").val($hosting.renewal_hosting);
        $("#renewal_price").val($hosting.renewal_price);
    }

</script>
@endpush
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                @push('breadcrumbs')
                    <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                        <strong>Hostings</strong></div>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                        class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.hostings.list') }}">Hostings</a>
                            </li>
                            <li class="breadcrumb-item">Detalle del Hosting</a></li>

                        </ol>
                    </div>
                @endpush
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-header row">
                    <div class="h3 col-lg-6 col-sm-12"><a target="_blank" href="{{$hosting->url}}">{{$hosting->url}}</a>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <a type="button" class="btn btn-warning mr-1 center" id="btn-guardar"
                            href="{{$hosting->cpanel_url}}" target="_blank"><i
                                class=" feather icon-hard-drive mr-1 h4 text-white"></i>Ir al Cpanel</a>
                        <a type="button" class="btn btn-success mr-1 center" id="btn-guardar" href="#renovar"
                            target="_blank" data-toggle="modal" onclick="renovarhosting({{$hosting}});">
                            <i class=" feather icon-refresh-ccw mr-1 h4 text-white"></i>Renovar</a>
                        <a type="button" class="btn btn-primary mr-1 center" id="btn-guardar" href="#edit"
                            target="_blank" data-toggle="modal" onclick="edithosting({{$hosting}});">
                            <i class=" feather icon-edit mr-1 h4 text-white"></i>Edit</a>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-6">

                    <div class="row px-2">
                        <div class="col-md-6 col-sm-1">
                            <div class="project-detail-titles">Fecha de Inicio</div>
                            <div class="mt-1 project-detail-dates">
                                <i class=" feather icon-calendar h4"></i>
                                <span>{{ date('d/m/Y', strtotime($hosting->create_date))}}</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-1">
                            <div class="project-detail-titles">Fecha de Vencimiento</div>
                            <div class="mt-1 project-detail-dates">
                                <i class=" feather icon-calendar h4"></i>
                                {{-- <span>{{date('d/m/Y', $hosting->renewal_hosting)}}</span> --}}
                                <span>{{date('d/m/Y', strtotime($hosting->due_date))}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 px-2">
                        <div class="col-md-6 col-sm-1">
                            <div class="project-detail-titles">Cantidad de años</div>
                            <div class="mt-1 project-detail-dates">
                                <span>{{($hosting->years <2) ? "$hosting->years Año" : "$hosting->years Años"}}</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-1">
                            <div class="project-detail-titles">Cliente</div>
                            <div class="mt-1 project-detail-dates">
                                <span>{{$hosting->user->name}} {{$hosting->user->last_name}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 px-2">
                        <div class="col-md-6 col-sm-1">
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

                    <div class="row mt-3 px-2">
                        <div class="col-md-12 col-sm-1">
                            <div class="project-detail-titles">Integración con Cpanel</div>
                            <div class="mt-1 project-detail-dates">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span><strong>URL CPanel:</strong> <a target="_blank"
                                                href="{{$hosting->cpanel_url}}">{{$hosting->cpanel_url}}</a></span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <span><strong>Usuario:</strong> <strong
                                                id="cpanel-email">{{$hosting->cpanel_email}}</strong></span>
                                        <i class="fa fa-copy fa-1x ml-1 text-info cursor-pointer"
                                            onclick="copiar('cpanel-email', this);"></i>
                                    </div>
                                    <div class="col-md-6">
                                        <span><strong>Contraseña:</strong> <strong
                                                id="cpanel-password">{{$hosting->cpanel_password}}</strong></span>
                                        <i class="fa fa-copy fa-1x ml-1 text-info cursor-pointer"
                                            onclick="copiar('cpanel-password', this);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @if(count($hosting->getRenewalHosting)>0)
                <div class="col-6">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-primary btn-block" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Renovaciones
                                </button>
                            </div>

                            <div id="collapseOne" class="collapse p-1" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr class="text-center">
                                                    <th>ID</th>
                                                    <th>PRECIO DE RENOVACIÓN</th>
                                                    <th>AÑOS</th>
                                                    <th>F. CREACIÓN</th>
                                                    <th>F. VENCIMIENTO</th>
                                                    <th>ESTADO</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($hosting->getRenewalHosting as $renewal)
                                                <tr>
                                                    <td>{{ $renewal->id }}</td>
                                                    <td>{{ $renewal->renewal_price }}</td>
                                                    <td>{{ $renewal->years }}</td>
                                                    <td>{{ $renewal->create_date}}</td>
                                                    <td>{{ $renewal->expire_date}}</td>
                                                    <td>
                                                        @if ($renewal->status == 1)
                                                        <label
                                                            class="label status-label status-label-purple">Activo</label>
                                                        @elseif ($hosting->status == 0)
                                                        <label
                                                            class="label status-label status-label-gray">Inactivo</label>
                                                        @endif
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
                @endif
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
                                <input name="hosting_url" id="hosting_url"
                                    class="form-control @error('hosting_url') is-invalid @enderror">
                                @error('hosting_url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="date"><strong>Fecha</strong></label>
                                <input type="date" name="date" id="date"
                                    class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="client"><strong>Cliente</strong></label>
                                <select name="client" id="client"
                                    class="form-control @error('client') is-invalid @enderror">
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
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="" selected disabled>Seleccione un estado...</option>
                                    @if ($item->name)
                                        
                                    @else
                                        
                                    @endif
                                    <option value="0">Activo</option>
                                    <option value="1">Inactivo</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="date_end"><strong>Cant. años</strong></label>
                                    <select name="date_end" id="date_end"
                                        class="form-control @error('date_end') is-invalid @enderror" required>
                                        <option value="" selected disabled>Seleccione los años para el hosting...
                                        </option>
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
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="price"><strong>Precio</strong></label>
                                    <input name="price" id="price"
                                        class="form-control @error('price') is-invalid @enderror">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="cpanel_url"><strong>URL Cpanel</strong></label>
                                    <input type="text" name="cpanel_url" id="cpanel_url"
                                        class="form-control @error('cpanel_url') is-invalid @enderror">
                                    @error('cpanel_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="cpanel_email"><strong>Email Cpanel</strong></label>
                                    <input type="text" name="cpanel_email" id="cpanel_email"
                                        class="form-control @error('cpanel_email') is-invalid @enderror">
                                    @error('cpanel_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="cpanel_password"><strong>Password Cpanel</strong></label>
                                    <input type="text" name="cpanel_password" id="cpanel_password"
                                        class="form-control @error('cpanel_password') is-invalid @enderror">
                                    @error('cpanel_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                    </div>
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
                            <div class="col-md-3 col-sm-12 ">
                                <div class="form-group">
                                    <label for="years">Años</label>
                                    <select name="years" id="years" class="form-control" required>
                                        <option value="" selected disabled>Seleccione los años para la renovacion...
                                        </option>
                                        <option value="1">1 Año</option>
                                        <option value="2">2 Años</option>
                                        <option value="3">3 Anos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label for="renewal_price"><strong>Precio</strong></label>
                                <input name="renewal_price" id="renewal_price"
                                    class="form-control  @error('renewal_price') is-invalid @enderror">
                                @error('renewal_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="create_date">Fecha de Inicio</label>
                                <input type="date" name="create_date" id="create_date"
                                    class="form-control @error('create_date') is-invalid @enderror">
                                @error('create_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
