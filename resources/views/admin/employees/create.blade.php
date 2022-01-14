@extends('layouts.app')

@push('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    function checkEmail() {
        var route = $("#email").attr("data-route") + '/' + $("#email").val();

        axios.get(route).then(response => {
            if (response.data == true) {
                $("#errors_div").html(
                    '<b><i class="fa fa-exclamation-circle"></i> El correo ingresado ya se encuentra registrado.</b>'
                );
                $("#errors_div").css('display', 'block');
                $("#btn-guardar").attr('disabled', true);
            } else {
                $("#errors_div").html();
                $("#errors_div").css('display', 'none');
                $("#btn-guardar").attr('disabled', false);
            }
        }).catch(error => {
            console.log(error);
        });
    }

    function checkPasswords() {
        if ($("#password").val() == $("#password_confirmation").val()) {
            $("#errors_div").html();
            $("#errors_div").css('display', 'none');
            $("#btn-guardar").attr('disabled', false);
        } else {
            $("#errors_div").html(
                '<b><i class="fa fa-exclamation-circle"></i> Las contraseñas ingresadas no coinciden.</b>');
            $("#errors_div").css('display', 'block');
            $("#btn-guardar").attr('disabled', true);
        }
    }
</script>
@endpush

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                @push('breadcrumbs')
                    <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                        Empleados</div>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.employees.list') }}">Empleados</a></li>
                            <li class="breadcrumb-item">Nuevo Empleado</li>
                        </ol>
                    </div>
                @endpush
            </div>
        </div>

        <div class="content-body">
            <div class="row" id="table-head">
                <form class="form" action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Nuevo Empleado</h3>
                            </div>
                            <div class="card-body pl-3 pr-3">
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}

                                <div class="row">
                                    {{-- Nombre --}}
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="name">Nombre <span style="color: red;">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Apellido --}}
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last_name">Apellido <span style="color: red;">*</span></label>
                                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror">

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Correo Electrónico --}}
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="email">Correo Electrónico <span style="color: red;">*</span></label>
                                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Fecha de nacimiento --}}
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="birthdate">Fecha de nacimiento</label>
                                            <input type="date" name="birthdate" id="birthdate" class="form-control @error('birthdate') is-invalid @enderror">

                                            @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Fecha de ingreso --}}
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="admission_date">Fecha de ingreso</label>
                                            <input type="date" name="admission_date" id="admission_date" class="form-control @error('admission_date') is-invalid @enderror">

                                            @error('admission_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Telefono --}}
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="phone">Telefono <span style="color: red;">*</span></label>
                                            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    {{-- Precio por hora --}}
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="price_per_hour">Precio por Hora</label>
                                            <input type="text" name="price_per_hour" id="price_per_hour" class="form-control @error('price_per_hour') is-invalid @enderror">

                                            @error('price_per_hour')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Billetera USDT-TRON --}}
                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <label for="tron_wallet">Billetera USDT-TRON</label>
                                            <input type="text" name="tron_wallet" id="tron_wallet" class="form-control @error('tron_wallet') is-invalid @enderror" >

                                            @error('tron_wallet')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Posición --}}
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="position">Posición <span style="color: red;">*</span></label>
                                            <select name="position" id="position" class="form-control" >
                                                <option value="" selected disabled>Seleccione una opción...</option>
                                                <option value="0">Desarrollador</option>
                                                <option value="1">Diseñador</option>
                                                <option value="2">Project Manager</option>
                                                <option value="3">Financiero</option>
                                            </select>

                                            @error('position')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    {{-- Contraseña --}}

                                     <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="password">Contraseña <span style="color: red;">*</span></label>
                                            <input type="password" name="password" id="password" class="form-control" onkeyup="checkPasswords();">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    {{-- Confirmar contraseña --}}
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="password_confirmation">Repetir Contraseña <span style="color: red;">*</span></label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" onkeyup="checkPasswords();">
                                        </div>
                                    </div>

                                    {{-- Foto --}}
                                    <div class="col-md-6 col-12 mb-2">
                                        <div class="form-group">
                                            <label class="h5" for="">Foto de perfil</label>
                                            <div class="media">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="photo"><b>Clic para agregar nueva foto</b></label>
                                                    <input type="file" id="photo"
                                                        class="custom-file-input @error('photo') is-invalid @enderror"
                                                        name="photo"
                                                        onchange="previewFile(this, 'photo_preview')"
                                                        accept="image/*"
                                                        value="{{ old('photo') }}">
                                                    @error('photo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center" id="photo_preview_wrapper">
                                            {{-- @if ($employee->photo)
                                            <img id="photo_preview" class="rounded" style="object-fit: cover;"
                                                width="140px" height="100px"
                                                src="{{ asset('storage/' . $employee->photo) }}" />
                                            @else --}}
                                            <img id="photo_preview" class="rounded d-none" style="object-fit: cover;"
                                                width="140px" height="100px"
                                                src="" />
                                            <i id="fat-user" class="rounded-circle feather icon-user" style="font-size: 140px;"></i>
                                            {{-- @endif --}}
                                        </div>
                                    </div>

                                    {{-- Curriculum vitae --}}
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="h5" for="">Curriculum vitae</label>
                                            <div class="media">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="curriculum"><b>Clic para agregar curriculum</b></label>
                                                    <input type="file" id="curriculum"
                                                        class="custom-file-input @error('curriculum') is-invalid @enderror"
                                                        name="curriculum"
                                                        onchange="previewFile2(this, 'photo_preview2')"
                                                        {{-- accept="image/*" --}}
                                                        >
                                                    @error('curriculum')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row justify-content-center" id="photo_preview_wrapper">
                                            @if (isset($employee->curriculum))
                                                <img id="photo_preview2" class="rounded" style="object-fit: cover;"
                                                    width="140px" height="100px"
                                                    src="{{ asset('storage/' . $employee->curriculum) }}" />
                                            @endif
                                        </div> --}}
                                    </div>

                                    <div class="col-md-12 pl-3">
                                        <div class="form-group">
                                            <div class="text-center"><label for="skills">Skills</label>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                @foreach ($skills as $skill)
                                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                                                    <input type="checkbox" class="form-check-input skills" value="{{ $skill->id }}" name="skills[]">
                                                    <label class="form-check-label">{{ $skill->skill }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Alerta para el correo y la contraseña --}}
                                    <div class="col-12 alert alert-danger" id="errors_div" style="display: none;">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-body pl-3 pr-3">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" id="name" class="form-control" autofocus required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last_name">Apellido</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control">
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
                                            <label for="birthdate">Fecha de Nacimiento</label>
                                            <input type="date" name="birthdate" id="birthdate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="admission_date">Fecha de Ingreso</label>
                                            <input type="date" name="admission_date" id="admission_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="phone">Teléfono</label>
                                            <input type="text" name="phone" id="phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="email">Correo Electrónico</label>
                                            <input type="text" name="email" id="email" class="form-control" data-route="{{ route('admin.check-email') }}" onblur="checkEmail();" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <label for="curriculum">CV</label>
                                            <input type="file" name="curriculum" id="curriculum" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="position">Posición</label>
                                            <select name="position" id="position" class="form-control" required>
                                                <option value="" selected disabled>Seleccione una opción...</option>
                                                <option value="0">Desarrollador</option>
                                                <option value="1">Diseñador</option>
                                                <option value="2">Project Manager</option>
                                                <option value="3">Financiero</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="price_per_hour">Precio por Hora</label>
                                            <input type="text" name="price_per_hour" id="price_per_hour" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="uphold_account">Billetera USDT-TRON</label>
                                            <input type="text" name="tron_wallet" id="tron_wallet" class="form-control">
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
                                            <label for="password_confirmation">Repetir Contraseña</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" onkeyup="checkPasswords();" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pl-3">
                                        <div class="form-group">
                                            <div class="text-center"><label for="skills">Skills</label>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                @foreach ($skills as $skill)
                                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                                                    <input type="checkbox" class="form-check-input skills" value="{{ $skill->id }}" name="skills[]">
                                                    <label class="form-check-label">{{ $skill->skill }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 alert alert-danger" id="errors_div" style="display: none;">

                                    </div>
                                </div>
                            </div> --}}
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

