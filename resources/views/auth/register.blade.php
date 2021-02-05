@extends('layouts.auth')

@section('content')
	<div class="row m-0">
        <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
            <img src="{{ asset('template/app-assets/images/pages/register.jpg') }}" alt="branding logo">
        </div>
        <div class="col-lg-6 col-12 p-0">
            <div class="card rounded-0 mb-0 p-2">
                <div class="card-header pt-50 pb-1">
                    <div class="card-title">
                        <h4 class="mb-0">Crear Cuenta</h4>
                    </div>
                </div>
                <p class="px-2">Rellena el siguiente formulario con tus datos.</p>
                <div class="card-content">
                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-label-group">
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre y Apellido" value="{{ old('name') }}" autofocus required>
                                <label for="inputName">Nombre y Apellido</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-label-group">
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
                                <label for="inputEmail">Correo Electrónico</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-label-group">
                                <select name="profile_id" id="profile_id" class="form-control" required>
                                    <option value="" selected disabled>Seleccione una opción...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Empleado</option>
                                    <option value="3">Cliente</option>
                                    <option value="4">Financiero</option>
                                </select>
                                <label for="inputEmail">Tipo de Usuario</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required>
                                <label for="inputPassword">Contraseña</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-label-group">
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirmar Contraseña" required>
                                <label for="inputConfPassword">Confirmar Contraseña</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <fieldset class="checkbox">
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" checked>
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class=""> Acepto los términos y condiciones.</span>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <a href="{{ route('login') }}" class="btn btn-outline-primary float-left btn-inline mb-50">Iniciar Sesión</a>
                            <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Registrar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection