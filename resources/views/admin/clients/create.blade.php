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
                        <form class="form" action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
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
                                                    <label for="last_name">Apellido</label>
                                                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="photo">Foto</label>
                                                    <input type="file" name="photo" id="photo" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="password">Contraseña</label>
                                                    <input type="password" name="password" id="password" class="form-control" onkeyup="checkPasswords();" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="email">Correo Electrónico</label>
                                                    <input type="text" name="email" id="email" class="form-control" data-route="{{ route('admin.check-email') }}" onblur="checkEmail();" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="phone">Teléfono</label>
                                                    <input type="text" name="phone" id="phone" class="form-control">
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
  
@endsection
