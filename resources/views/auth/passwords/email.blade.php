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
                <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4 d-flex justify-content-center"
                    style="z-index: 2;">
                    <div class="container">

                        <div class="bg-auth p-2 text-white rounded">
                            <div class="card-header">
                                <img class="img-fluid center-block logo-center pl-2 pr-2" width="250px" height="230px"
                                    src="{{ asset('images/valdusoft/logo.png') }}" />
                            </div>
                            <h2 class="font-weight-bold text-white text-center pr-2 pl-2 ">Bienvenido a Valdusoft</h2>
                            <h4 class="pl-2 pr-2 pt-0 text-center text-white">Restablecer contraseña</h4>
                            <p class="pl-2 pr-2 pt-0 text-center"><small>Te enviaremos un código a la dirección de correo que ingreses para que recuperes tu contraseña.</small></p>
                            <div class="card-content">
                                <div class="card-body pt-1 row justify-content-center">
                                    <form action="{{ route('password.email') }}" method="POST">
                                        @csrf
                                        <label class="text-white h6 mb-1">Email</label>
                                        <fieldset class="form-label-group  has-icon-left ">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Ingresa tu correo"
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

                                        
                                        <div>
                                            <button type="submit"
                                                class="btn btn-auth-1 btn-lg mt-3 mb-1 btn-block">Enviar</button>
                                        </div>

                                        <div class="form-group d-flex justify-content-center align-items-center">

                                            <div class="text-center"><a href="{{ route('login') }}"
                                        class="card-link text-info ">Volver al login</a></div>
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
    <img class="img-auth" width="650px" height="500px" style="z-index: 1;" src="{{ asset('images/valdusoft/logo-fondo.png') }}" />
</div>


<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
<form method="POST" action="{{ route('password.email') }}">
    @csrf
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Send Password Reset Link') }}
        </button>
    </div>
</div>
    </form>
        </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
