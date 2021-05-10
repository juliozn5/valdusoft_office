@extends('layouts.app')

@push('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function checkEmail(){
            var route = $("#email").attr("data-route")+'/'+$("#email").val();

            axios.get(route).then(response => {
                if (response.data == true){
                    $("#errors_div").html('<b><i class="fa fa-exclamation-circle"></i> El correo ingresado ya se encuentra registrado.</b>');
                    $("#errors_div").css('display', 'block');
                    $("#btn-guardar").attr('disabled', true);
                }else{
                    $("#errors_div").html();
                    $("#errors_div").css('display', 'none');
                    $("#btn-guardar").attr('disabled', false);
                }
            }).catch(error => {
                 console.log(error);
            });
        }

        function checkPasswords(){
            if ($("#password").val() == $("#password_confirmation").val()){
                $("#errors_div").html();
                $("#errors_div").css('display', 'none');
                $("#btn-guardar").attr('disabled', false);
            }else{
                $("#errors_div").html('<b><i class="fa fa-exclamation-circle"></i> Las contraseñas ingresadas no coinciden.</b>');
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
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">Empleados</div>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.employees') }}">Empleados</a></li>
                                    <li class="breadcrumb-item">Nuevo Empleado</li>
                                </ol>
                            </div>
                        </div>
                    </div>
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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="name">Nombre</label>
                                                <input type="text" name="name" id="name" class="form-control">
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
                                                <label for="skills">Skills</label>
                                                <input type="text" name="skills" id="skills" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="email">Correo Electrónico</label>
                                                <input type="text" name="email" id="email" class="form-control" data-route="{{ route('admin.check-email') }}" onblur="checkEmail();">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="curriculum">CV</label>
                                                <input type="file" name="curriculum" id="curriculum" class="form-control">
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
                                                <label for="password">Contraseña</label>
                                                <input type="password" name="password" id="password" class="form-control" onkeyup="checkPasswords();">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="password_confirmation">Repetir Contraseña</label>
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" onkeyup="checkPasswords();">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="uphold_account">Cuenta Uphold</label>
                                                <input type="text" name="uphold_account" id="uphold_account" class="form-control">
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
