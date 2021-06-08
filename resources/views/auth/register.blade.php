
@extends('layouts.auth')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 1-column navbar-floating footer-static bg-full-screen-image blank-page
blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column"
@endpush

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body position-relative">
            <section class="row flexbox-container bg-body">
                <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-4 d-flex justify-content-center"
                    style="z-index: 2;">
                    <div class="container">

                        <div class="bg-auth p-2 text-white rounded">
                            <div class="card-header">
                                <img class="img-fluid center-block logo-center pl-2 pr-2" width="250px" height="230px"
                                    src="{{ asset('images/logo.png') }}" />
                            </div>
                            <h2 class="font-weight-bold text-white text-center pr-2 pl-2 ">Bienvenido a Valdusoft</h2>
                            <p class="pl-2 pr-2 pt-0 text-center">Completa los datos a continuación y registrate</p>
                            <div class="card-content">
                                <div class="card-body pt-1 row justify-content-center">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 ">
                                                <label class="text-white h6 mb-1">Nombre y apellido</label>
                                                <div class="form-label-group">
                                                    <input type="text" name="name" id="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="Nombre y Apellido" value="{{ old('name') }}"
                                                        autofocus required>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                <label class="text-white h6 mb-1">Email</label>
                                                <div class="form-label-group">
                                                    <input type="email" name="email" id="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        placeholder="Correo Electrónico" value="{{ old('email') }}"
                                                        required>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <!-- <div class="form-label-group">
                                <select name="role" id="role" class="form-control" required>
                                    <option value="" selected disabled>Seleccione una opción...</option>
                                    <option value="administrator">Administrador</option>
                                    <option value="employe">Empleado</option>
                                    <option value="client">Cliente</option>
                                    <option value="financial">Financiero</option>
                                </select>
                                <label for="inputEmail">Tipo de Usuario</label>
                            </div> -->

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                <label class="text-white h6 mb-1">Contraseña</label>
                                                <div class="form-label-group input-field">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        placeholder="Contraseña" required>
                                                    <button type="button" class="feather icon-eye"
                                                        id="eye-btn"></button>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                <label class="text-white h6 mb-1">Confirmar Contraseña</label>
                                                <div class="form-label-group input-field">
                                                    <input type="password" name="password_confirmation"
                                                        id="password-confirm" class="form-control"
                                                        placeholder="Confirmar Contraseña" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary float-left ">
                                                        <input type="checkbox" name="term" id="term"
                                                            class="@error('term') is-invalid @enderror"
                                                            {{ old('term') ? 'checked' : '' }} required>
                                                        @error('term')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <span> Acepto los <a
                                                            href="https://foundation.wikimedia.org/wiki/Terms_of_Use/es"
                                                            target="_blank" class="text-info">términos y
                                                            condiciones.</a></span>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-auth-1 btn-lg btn-block">Registrar</button>
                                        <div class="text-right mt-1"><a href="{{route ('login') }}"
                                                class="card-link text-info ">¿Ya tienes una cuenta? <b>Inicia
                                                    Sesión.</b></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <img class="img-auth" width="650px" height="500px" style="z-index: 1;" src="{{ asset('images/logo-fondo.png') }}" />
</div>
@endsection

@push('scripts')
<script>
    // login script
    const eyeBtn = document.getElementById("eye-btn");
    const passwordField = document.getElementById("password");
    const passwordField2 = document.getElementById("password-confirm");

    eyeBtn.addEventListener("click", (e) => {
        if (passwordField.type === "password") {
            // set button class atribute to eye-slash icon
            e.target.setAttribute("class", "feather icon-eye-off float-right");
            // change the input type to text
            passwordField.type = "text";
        } else {
            // set button class atribute to eye icon
            e.target.setAttribute("class", "feather icon-eye float-right");
            // change the input type to password
            passwordField.type = "password";
        }
    });


    eyeBtn.addEventListener("click", (e) => {
        if (passwordField2.type === "password") {
            // set button class atribute to eye-slash icon
            e.target.setAttribute("class", "feather icon-eye-off float-right");
            // change the input type to text
            passwordField2.type = "text";
        } else {
            // set button class atribute to eye icon
            e.target.setAttribute("class", "feather icon-eye float-right");
            // change the input type to password
            passwordField2.type = "password";
        }
    });

</script>

@endpush