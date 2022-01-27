@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
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
    @if($user -> photo != NULL)
    previewPersistedFile("{{asset('storage/photo-profile/'.$user->photo)}}", 'photo_preview');
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

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
  <div class="content-wrapper">
      <div class="card">
          <div class="content-body">
              <div class="card">
                  <div class="card-content p-1">
                      <div class="card-body">

                        <div class="row">
                          <div class="col-3 align-self-center text-center">
                            @if (Auth::user()->photo === NULL)
                              <a data-toggle="modal" data-target="#fotos"><i class="rounded-circle ml-2 feather icon-user" style="font-size: 55px;"></i></a>
                            @else
                              <a><img class="rounded-circle ml-2"  src="{{ asset('storage/photo-profile/'.$user->photo) }}" alt="" width="55px" height="55px"></a>
                            @endif
                            <a href="" class="d-block" data-toggle="modal" data-target="#contrasennaModal">Cambiar contraseña</a>
                          </div>
                          <div class="col-6">
                              <h3 class="card-title mb-1" title="Hello from speech bubble!">{{ $user->name }} {{ $user->last_name }}</h3>
                              <p>{{ $user->email }}</p>
                          </div>
                          <div class="col-2 align-self-center text-center">
                          
                              <i class="far fa-edit ml-2" style="font-size:30px;" data-toggle="modal" data-target="#editModal"></i>
                            
                          </div>
                        </div>



                        <!-- Modal edit -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Editar perfil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="{{ route('profile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                              <div class="modal-body">
                                
                                  @csrf
                                  @method('PATCH')
                                  <div class="media">
                                    <div class="custom-file">
                                      <label class="custom-file-label" for="photo">Seleccione su
                                        Foto <b>(Se permiten JPG o PNG.
                                          Tamaño máximo de 800kB)</b></label>
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
                                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre" value="{{ $user->name }}">
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
                                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                                          @error('email')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light">Guardar</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>




                        <!-- Modal contrasena-->
                        <div class="modal fade" id="contrasennaModal" tabindex="-1" aria-labelledby="contrasennaModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="contrasennaModalLabel">Cambiar contraseña</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="POST" action="{{ route('change.password') }}">
                              <div class="modal-body">
                                @csrf 
   
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach 
          
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña actual</label>
          
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                    </div>
                                </div>
          
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>
          
                                    <div class="col-md-6">
                                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                    </div>
                                </div>
          
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
            
                                    <div class="col-md-6">
                                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">
                                  Actualizar Contraseña
                              </button>
                              </div>
                              </form>
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

@endsection