@extends('layouts.app')

@push('custom_js')
<script>
    $(document).ready(function() {
        @if(!$hosting - > getMedia('photo') - > isEmpty())
        @if(in_array($hosting - > getMedia('photo') - > first() - > mime_type, array("image/png", "image/gif", "image/jpeg")))
        previewPersistedFile("{{ $hosting->getMedia('photo')->first()->file }}", 'photo_preview');
        @endif
        @endif
    });

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

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                @push('breadcrumbs')
                    <div class="content-header-title float-left mb-0">Hosting</div>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.hostings.list') }}">Hosting</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.hostings.edit', $hosting->id) }}">Editar Hosting</a>
                            </li>
                        </ol>
                    </div>
                @endpush
            </div>

        </div>


        <div class="row d-flex justify-content-center mt-5 pb-3">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editando el Hosting de <span class="text-primary font-weight-bold">{{ $hosting->client }}</span></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin,hostings.update', $hosting->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="client">Cliente</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="client" value="{{ $hosting->client }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="url">URL</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="url" value="{{ $hosting->url }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-globe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="create_date">Fecha de Creacion</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="date" class="form-control" name="create_date" value="{{ $hosting->create_date }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="due_date">Fecha de Expiración</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="date" class="form-control" name="due_date" value="{{ $hosting->due_date }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="status">Estado</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="" selected disabled>Seleccione un estado...</option>
                                                    <option value="0">Activo</option>
                                                    <option value="1">Inactivo</option>
                                            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <fieldset>
                                                <label class="h5" for="due_date">Imagen para el Cliente</label>
                                                <div class="media">
                                                    <div class="custom-file">
                                                        <label class="custom-file-label" for="photo"><b>Seleccione una imagen para el Cliente</b></label>
                                                        <input type="file" id="photo" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" onchange="previewFile(this, 'photo_preview')" accept="image/*">
                                                        @error('photo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-4 mt-4 d-none" id="photo_preview_wrapper">
                                                    <div class="col"></div>
                                                    <div class="col-auto">
                                                        <img id="photo_preview" class="img-fluid rounded" />
                                                    </div>
                                                    <div class="col"></div>
                                                </div>

                                            </fieldset>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Editar</button>
                                            <a href="{{ route('admin.hostings.list') }}" class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection