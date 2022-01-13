@extends('layouts.app')

@section('content')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                @push('breadcrumbs')
                    <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                    Clientes</div>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.clients.list') }}">Cliente</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.clients.edit', $client->id) }}">Editar Cliente</a>
                            </li>
                        </ol>
                    </div>
                @endpush
            </div>

        </div>

        <div class="row d-flex justify-content-center pb-3">
            <div class=" col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2">Editando el cliente <span class="text-primary font-weight-bold">{{ $client->name }}</span></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body px-2">
                            <form class="form form-vertical" action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="h5" for="name">Nombre</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $client->name }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="h5" for="last_name">Apellido</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $client->last_name }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="h5" for="email">Email</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $client->email }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-globe"></i>
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="h5" for="phone">Telefono</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $client->phone }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-phone"></i>
                                                    </div>
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="row justify-content-between">
                                                <div class="col-12">
                                                    <label class="h5" for="due_date">Imagen para el Cliente</label>
                                                    <div class="media">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="photo"><b>Foto del Cliente</b></label>
                                                            <input type="file" id="photo" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" onchange="previewFile(this, 'photo_preview')" accept="image/*">
                                                            @error('photo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="rounded py-4 mx-auto d-block" id="photo_preview_wrapper">
                                                    <div class="col text-center">
                                                        @if (isset($client->photo))
                                                        <img id="photo_preview" class="rounded" style="object-fit: cover;" width="190px" height="150px" src="{{ asset('storage/photo-profile/' . $client->photo) }}" />
                                                        @else
                                                        <img id="photo_preview" class="rounded d-none" style="object-fit: cover;" width="140px" height="100px" src="" />
                                                        <i id="fat-user" class="rounded-circle feather icon-user" style="font-size: 140px;"></i>
                                                        @endif
                                                    </div>


                                                </div>
                                            </div>


                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Editar</button>
                                                <a href="{{ route('admin.clients.list') }}" class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light">Cancelar</a>
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

@push('custom_js')
<script>
    function previewFile(input, preview_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fat-user').addClass('d-none');
                $("#" + preview_id).removeClass('d-none');
                $("#" + preview_id).attr('src', e.target.result);
                $("#" + preview_id).css('height', '100px');
                $("#" + preview_id).parent().parent().removeClass('d-none');
            }
            $("label[for='" + $(input).attr('id') + "']").text(input.files[0].name);
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewPersistedFile(url, preview_id) {
        
        $("#" + preview_id).attr('src', url);
        $("#" + preview_id).css('height', '100px');
        $("#" + preview_id).parent().parent().removeClass('d-none');

    }
</script>
@endpush