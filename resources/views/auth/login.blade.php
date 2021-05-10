@extends('layouts.auth')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 1-column navbar-floating footer-static bg-full-screen-image blank-page
blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column"
@endpush


@push('scripts')
<script>
    // login script
    const eyeBtn = document.getElementById("eye-btn");
    const passwordField = document.getElementById("password");

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

</script>
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
                <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4 d-flex justify-content-center"
                    style="z-index: 2;">
                    <div class="container">

                        <div class="bg-auth p-2 text-white rounded">
                            <div class="card-header">
                                <img class="img-fluid center-block logo-center pl-2 pr-2" width="250px" height="230px"
                                    src="{{ asset('images/logo.png') }}" />
                            </div>
                            <h2 class="font-weight-bold text-white text-center pr-2 pl-2 ">Bienvenido a Valdusoft</h2>
                            <p class="pl-2 pr-2 pt-0 text-center">Completa los datos a continuación e inicia sesión</p>
                            <div class="card-content">
                                <div class="card-body pt-1 row justify-content-center">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <label class="text-white h6 mb-1">Email</label>
                                        <fieldset class="form-label-group  has-icon-left ">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Correo Electrónico"
                                                value="{{ old('email') }}" autofocus required>
                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>

                                        <label class="text-white h6 mb-1">Contraseña</label>
                                        <fieldset class="form-label-group has-icon-left input-field">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" id="password" placeholder="Contraseña" required>
                                            <button type="button" class="feather icon-eye" id="eye-btn"></button>

                                            <div class="form-control-position">
                                                <i class="feather icon-lock"></i>
                                            </div>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <div class="form-group d-flex justify-content-end align-items-center">

                                            <div class="text-right"><a href="{{ route('password.request') }}"
                                                    class="card-link text-info ">¿Olvidaste
                                                    tu contraseña?</a></div>
                                        </div>

                                        <div>
                                            <button type="submit"
                                                class="btn btn-auth-1 btn-lg btn-block">Ingresar</button>
                                        </div>

                                        <div class="text-right mt-1"><a href="{{route ('register') }}"
                                                class="card-link text-info ">¿Aún no tienes una cuenta?
                                                <b>Regístrate.</b></a>
                                        </div>

                                        <div class="text-left mt-2">
                                            <fieldset class="checkbox">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="remember" id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">Mantener mi sesión abierta</span>
                                                </div>
                                            </fieldset>
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

