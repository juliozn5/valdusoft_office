@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('custom_css')

<style>

.button {
  width: 150px;
  height: 25px;
  margin: 5px 0 5px 0;
  color: #fff;
  background: rgba(71, 73, 77, 1);
  border: none;
  font-size: 14px;
  outline: none;
  border-radius: 5px;
}

.button:hover {
  background: rgba(71, 73, 77, 0.8);
}

.button:active {
  margin: 6px inherit 4px inherit;
  background: rgba(71, 73, 77, 0.8);
}

/*--- /GENERAL ---*/

#profile-edit-save {
  box-sizing: border-box;
  width: 800px;
  margin: 0 auto;
  padding: 10px;
  border-bottom: 1px solid rgba(84, 183, 222, 0.5);
  background-color: rgba(84, 183, 222, 0.3);
}

#editSave {
  display: block;
  margin: 0 auto;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  background-color: #2699c7;
  color: #fff;
  font-size: 14px;
  outline: none;
}

#profile-edit-area {
  width: 800px;
  margin: 0 auto;
}

#edit-area-left,
#edit-area-right {
  box-sizing: border-box;
}

#edit-area-left {
  width: 400px;
  morgin: 0;
  float: left;
}

#edit-area-right {
  width: 400px;
  margin-left: 400px;
}
#profile-edit-area {
  margin: 50px auto 10px;
}

#profile-edit-area table {
  margin: 0 auto 10px;
  vertical-align: top;
}

#profile-edit-area table tr {
  vertical-align: top;
}

.edit-title {
  padding-top: 15px;
}

.profileInputBox {
  width: 200px;
  height: auto;
  margin: 10px;
  padding: 10px;
  border: none;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
  background-color: rgb(255, 255, 255);
  font-size: 16px;
  color: rgb(63, 63, 63);
  outline: none;
}

#edit-area-right textarea {
  height: 200px;
  resize: none;
}

</style>
@endpush


@push('custom_js')
<script>
    $(document).ready(function() {
      @if(!$user->getMedia('photo')->isEmpty())
          @if(in_array($user->getMedia('photo')->first()->mime_type,array("image/png", "image/gif", "image/jpeg")))
            previewPersistedFile("{{ $user->getMedia('photo')->first()->file }}", 'photo_preview');
          @endif
        @endif
    });

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
        </div>
        <div class="content-body">
        
 
              <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
              aria-labelledby="account-pill-general" aria-expanded="true">

              <form action="{{ route('profile.update',$user->id) }}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="media">
                      <div class="custom-file">
                          <label class="custom-file-label" for="photo">Seleccione su
                              Foto <b>(Se permiten JPG o PNG.
                              Tamaño máximo de 800kB)</b></label>
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
                  
                  <hr>
               
                  <div class="row">
                      <div class="col-12">
                          <div class="form-group">
                              <div class="controls">
                                  <h2 class="font-weight-bold">Datos Personales</h2>
                              </div>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                              <div class="controls">
                                  <label class="required" for="">Nombre y Apellido</label>
                                  <input type="text"
                                      class="form-control @error('name') is-invalid @enderror"
                                      id="name" name="name" placeholder="Nombre"
                                      value="{{ $user->name }}">
                                  @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                              </div>
                          </div>
                      </div>

                      <div class="col-6">
                          <div class="form-group">
                              <div class="controls">
                                  <label class="required" for="email">Email</label>
                                  <input type="email"
                                      class="form-control @error('email') is-invalid @enderror"
                                      id="email" name="email" placeholder="Email"
                                      value="{{ $user->email }}">
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label class="required" for="role">Role</label>
                              <select type="text"
                                  class="form-control @error('role') is-invalid @enderror"
                                  id="role" name="role">
                                <option value="{{Auth::user()->role}}" selected>{{Auth::user()->role}}</option>
                                <option value="0">Nuevo (0)</option>
                                <option value="1">Administrador (1)</option>
                                <option value="2">Cliente (2)</option>
                                <option value="3">Trabajador (3)</option>
                            </select>
                              @error('role')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <hr>
                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                          <button type="submit"
                              class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light">GUARDAR</button>
                      </div>
                  </div>
              </form>
          </div>
        </div>
    </div>
</div>

        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-dark">
            <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="https://valdusoft.com" target="_blank">Valdusoft,</a>All rights Reserved</span>
                <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
            </p>
        </footer>
        <!-- END: Footer-->
@endsection