@extends('layouts.app')

@push('custom_js')
<script>
    function previewFile(input, preview_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#" + preview_id).attr('src', e.target.result);
                $("#" + preview_id).css('height', '300px');
                $("#" + preview_id).parent().parent().removeClass('d-none');
            }
            $("label[for='" + $(input).attr('id') + "']").text(input.files[0].name);
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewPersistedFile(url, preview_id) {
        $("#" + preview_id).attr('src', url);
        $("#" + preview_id).css('height', '300px');
        $("#" + preview_id).parent().parent().removeClass('d-none');

    }
</script>
@endpush

@section('content')
@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
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
                        <h2 class="content-header-title float-left mb-0">Hosting</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.hostings.list') }}">Hosting</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.hostings.create') }}">Añadir Hosting</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form class="form" action="{{ route('admin.hostings.store') }}" method="POST">
                @csrf
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Nuevo Hosting</h3>
                        </div>
                        <div class="card-body pl-3 pr-3">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="hosting_url">URL</label>
                                        <input name="hosting_url" id="hosting_url" class="form-control @error('hosting_url') is-invalid @enderror">
                                        @error('hosting_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="date">Fecha de Inicio</label>
                                        <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror">
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
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
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="client">Cliente</label>
                                        <select name="client" id="client" class="form-control @error('client') is-invalid @enderror">
                                            <option value="" selected disabled>Seleccione un cliente...</option>
                                            @foreach ($clients as $item)
                                            <option value="{{ $item->id }}">{{ $item->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('client')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="price"><strong>Precio</strong></label>
                                        <input name="price" id="price" class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="renewal_price"><strong>Precio de Renovacion</strong></label>
                                        <input name="renewal_price" id="renewal_price" class="form-control @error('renewal_price') is-invalid @enderror">
                                        @error('renewal_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="status">Estado</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="" selected disabled>Seleccione un estado...</option>
                                            <option value="0">Activo</option>
                                            <option value="1">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cpanel_url"><strong>URL Cpanel</strong></label>
                                        <input name="cpanel_url" id="cpanel_url" class="form-control @error('cpanel_url') is-invalid @enderror">
                                        @error('cpanel_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cpanel_email"><strong>Email Cpanel</strong></label>
                                        <input name="cpanel_email" id="cpanel_email" class="form-control @error('cpanel_email') is-invalid @enderror">
                                        @error('cpanel_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cpanel_password"><strong>Password Cpanel</strong></label>
                                        <input name="cpanel_password" id="cpanel_password" class="form-control @error('cpanel_password') is-invalid @enderror">
                                        @error('cpanel_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-12 alert alert-danger" id="errors_div" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light" id="btn-guardar">GUARDAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection