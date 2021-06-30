@extends('layouts.app')

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.hostings.create') }}">Añadir
                                        Hosting</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="content-body">
    <div class="row" id="table-head">
        <form class="form" action="{{ route('admin.hostings.store') }}" method="POST">
        @csrf
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-2">Nuevo Hosting</h3>
                    </div>
<div class="card-body">
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="url">Nombre</label>
                    <input type="text" name="url" id="url" class="form-control" required>
            </div>
        </div>
<div class="col-md-4 col-12">
    <div class="form-group">
        <label for="create_date">Fecha de inicio</label>
            <input type="date" name="create_date" id="create_date" class="form-control" required>
    </div>
</div>
<div class="col-md-4 col-12">
        <div class="form-group">
            <label for="due_date">cantidad de años</label>
                <input type="date" name="due_date" id="due_date" class="form-control">
        </div>
    </div>
<div class="col-md-4 col-12">
    <div class="form-group">
        <label for="user_id">Cliente</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="" selected disabled>Seleccione un cliente...</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }} {{ $client->last_name }}</option>
                    @endforeach
            </select>
        </div>
    </div>
<div class="col-12 alert alert-danger" id="errors_div" style="display: none;">
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
