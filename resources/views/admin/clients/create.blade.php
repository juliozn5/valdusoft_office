@extends('layouts.app')
@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush
@push('custom_js')
<script>

  function previewFile(input, preview_id) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
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

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<!--<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Cliente</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.clients.list') }}">Cliente</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.clients.create') }}">Añadir
                                        Cliente</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>-->

        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                                    Cliente</div>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('admin.clients.list') }}">Cliente</a></li>
                                        <li class="breadcrumb-item">Nuevo Cliente</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="content-body">
                    <div class="row" id="table-head">
                        <form class="form" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-2">Nuevo Cliente</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="name">Nombre</label>
                                                    <input type="text" name="name" id="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="name">Apellido</label>
                                                    <input type="text" name="name" id="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="logo">Foto</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="logo" id="logo">
                                                        <label class="custom-file-label" for="logo" >Seleccione una foto</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="email">Correo</label>
                                                    <input type="email" name="Email" id="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="name">Telefono</label>
                                                    <input type="number" name="name" id="name" class="form-control" required>
                                                </div>
                                            </div>
                                            
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
        </div>  
  <!--      <div class="row d-flex justify-content-center mt-5 pb-3">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Añadir Cliente</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin.clients.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="name">Nombre</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Nombre del Cliente">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="lastname">Apellido</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="lastname"
                                                        placeholder="Apellido del Cliente">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="email">Email</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="URL del Hosintg">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-globe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="phone">Telefono</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="phone"
                                                        placeholder="URL del Hosintg">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-12">
                                            <fieldset>
                                                <label class="h5" for="due_date">Imagen para el Cliente</label>
                                                <div class="media">
                                                    <div class="custom-file">
                                                        <label class="custom-file-label" for="photo"><b>Seleccione una imagen para el Cliente</b></label>
                                                        <input type="file" id="photo"
                                                            class="custom-file-input @error('photo') is-invalid @enderror"
                                                            name="photo" onchange="previewFile(this, 'photo_preview')"
                                                            accept="image/*">
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
                                            <button type="submit"
                                                class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Añadir</button>
                                            <a href="{{ route('admin.clients.list') }}"
                                                class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light">Cancelar</a>
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
</div>-->
@endsection
