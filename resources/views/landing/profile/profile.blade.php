@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="card">
            <div class="content-body">
                <div class="card">
                    <div class="card-header" style="padding:30px 0px 0px 30px;">
                        @if (Auth::user()->photo != NULL)
                        <a><img class="rounded-circle ml-2" src="{{ asset('storage/photo-profile/'.$user->photo) }}" alt="" width="55px" height="55px" data-toggle="modal" data-target="#fotos"></a>

                        @else
                        <a><img src="{{asset('images/valdusoft/valdusoft.png')}}" alt="avatar" height="40" width="40" data-toggle="modal" data-target="#fotos"></a>
                        @endif
                        <div class="col ml-1">
                            <h3 class="card-title mb-1" title="Hello from speech bubble!">{{ $user->name }} {{ $user->last_name }}</h3>
                            {{ $user->email }}
                        </div>
                    </div>
                </div>

                <!--Data-->
                <div class="card-body">
                    <div class="ml-4 mb-3">
                        <div class="row">
                            <div class="col-sm-8 col-md-6 project-detail-titles">Numero de telefono</div>
                            <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 project-detail-titles">Cambiar Contraseña</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-7 col-md-7 col-lg-6">
                                <p style="font-size: 17px;">{{$user->phone}} <a data-toggle="modal" data-target="#telefono">
                                        <i class="far fa-edit ml-2" style="font-size:21px;"></i></p>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-5 offset-md-2  offset-lg-0">
                                <div class="row">
                                    <div class="col-sm-5 col-md-6"><input id="password" type="password" class="form-control" value="$user->password" name="current_password" disabled></div>
                                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0"><a data-toggle="modal" data-target="#modal20"><i class="far fa-edit ml-2" style="font-size:21px;"></i></a></div>
                                </div>
                                <div class="col-md-6 row ">

                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--ASSIGNED PROJECTS-->
                    {{-- Sección de Proyectos Asignados --}}
                    <div class="" style="padding:0px 0px 0px 50px;">
                        <div class="project-detail-titles">Proyectos Asignados</div>
                        <div class="mt-1">
                            @php $cont = 0; @endphp
                            @foreach ($project as $item)
                            <a href="">
                                <div class="text-center text-white d-inline-block mr-1">
                                    <div class="project-circle" style="background-color:{{ $itemColors[$cont] }}"><strong> {{ $item->id }}</strong></div>
                                </div>
                            </a>
                            @php
                            if ($cont == 2){
                            $cont = 0;
                            }else{
                            $cont++;
                            }
                            @endphp
                            @endforeach
                        </div>
                    </div>



                    <!--DATE OF BIRTH-->
                    <div class="row mt-3 " style="padding:0px 0px 0px 50px;">
                        <div class="col-md-3 col-sm-1">
                            <div class="project-detail-titles">Fecha de Nacimiento</div>
                            <div class="mt-1 project-detail-dates">
                                <img src="{{ asset('images/svg/calendar.svg')}}">
                                <span>{{ date('d/m/Y', strtotime($user->birthdate)) }}</span>
                            </div>
                        </div>

                        <!--DATE OF ADMISSION-->
                        <div class="col-md-3 col-sm-1">
                            <div class="project-detail-titles">Fecha de Ingreso</div>
                            <div class="mt-1 project-detail-dates">
                                <img src="{{ asset('images/svg/calendar.svg')}}">
                                <span>{{ date('d/m/Y', strtotime($user->admission_date)) }}</span>
                            </div>
                        </div>

                        <!--NEXT VACATIONS-->
                        <div class="col-md-3 col-sm-1">
                            <div class="project-detail-titles">Próximas Vacaciones</div>
                            <div class="mt-1 project-detail-dates">
                                <img src="{{ asset('images/svg/calendar.svg')}}">
                                <span> {{(is_null($fechaUser)) ? 'Dato no disponible' : date('d-m-Y', strtotime($fechaUser)) }}</span>
                            </div>
                        </div>
                    </div>

                    <!--SKILLS SECTION-->
                    <div class="mt-3 pr-2" style="padding:0px 0px 0px 50px;">
                        <div class="project-detail-titles">Habilidades</div>
                        <br>
                        @foreach ($user->skills as $skill)
                        <div class="text-center text-white d-inline-block mr-1">
                            <div class="project-detail-skill">{{ $skill->skill }}</div>
                        </div>
                        @endforeach
                        <div class="text-center text-white d-inline-block mr-1">
                            <a href="#availableSkills" data-toggle="modal">
                                <img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Tecnología" height="40" width="40">
                            </a>
                        </div>
                    </div>

                    <div class="mt-3" style="padding:0px 0px 0px 50px;">
                        <div class="project-detail-titles mb-1"><strong>Curriculum Vitae<strong></div>
                        <div class="">
                            <div class="ml-2 pl-1 pt-1 position-absolute"><span>{{ $user->curriculum}}</span></div>
                        </div>
                        <a href="{{ asset('storage/flie-curriculum/'.$user->curriculum) }}" download><img class="" src="{{asset('images/icons/arrow-down.png')}}" alt=""></a>
                        <div class="d-inline-block mr-1 ml-5">
                            <a href="#availableCurriculum" data-toggle="modal">
                                <img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Tecnología" height="40" width="40">
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3 col-sm-1 mt-3" style="padding:0px 0px 0px 60px;">
                            <div class="project-detail-titles"><strong>Precio Por Hora</strong></div>
                            <div class="mt-1 project-detail-dates">
                                <img src="{{ asset('images/icons/dollar.png')}}" alt="" class="mr-1"><span>{{ $user->price_per_hour}} USDT</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-1 mr-3 mt-3">
                            <div class="project-detail-titles"><strong>Billetera USDT Red tron<strong></div>
                            <div class="mt-1 project-detail-dates">
                                <img src="{{ asset('images/icons/uphold.png')}}" alt="" class="mr-1"><span>{{ $user->tron_wallet}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="fotos">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Editar foto de perfil</h5>
                    <a type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></a>
                </div>
                <div class="modal-body">

                    <form action="{{ route('profile.updates',$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="media">
                            <div class="custom-file">
                                <label class="custom-file-label" for="photo">Seleccione su foto <b>(Se permiten JPG o PNG.
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

                        <div class=" col-12 d-flex flex-sm-row flex-column justify-content-end">
                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light">GUARDAR</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!--Cambiar Numero de Celular-->
    <div class="modal fade" id="telefono" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar numero de telefono</h5>
                    <a type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></a>
                </div>
                <form method="post" action="{{ route('employee.profiles') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="col-10 mt-1 ml-3">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" id="phone" class="form-control" value="{{$user->phone}}" name="phone">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--Cambiar La Contraseña-->
    <div class="modal fade" id="modal20" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <div class="card-header d-flex ">
                        <h3 class="text-white">Cambiar Contraseña</h3>
                    </div>

                    <a type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></a>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('change-password') }}">
                            @csrf
                            @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                            @endforeach

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña actual</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="current_password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                                <div class="col-md-6">
                                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password">
                                </div>
                            </div>
                    </div>
                </div>
                <hr>
                <div class="modal-footer">
                    <div class="col offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Actualizar Contraseña
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modificar Skills-->
    <div class="modal fade text-left" id="availableSkills" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel110">Modificar Skills</h5>
                    <a data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <form action="{{ route('employee.profile.update-skills') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="modal-body">
                        <div class="row ml-2 mr-2">
                            @foreach ($availableSkills as $availableSkill)
                            @php
                            $check = 0;
                            if (in_array($availableSkill->id, $skillsActivos)){
                            $check = 1;
                            }
                            @endphp
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                <label class="form-check-label" for="skill-{{ $availableSkill->id }}">
                                    <input type="checkbox" class="form-check-input" id="skill-{{ $availableSkill->id }}" value="{{ $availableSkill->id }}" name="skills[]">
                                    {{ $availableSkill->skill }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Subir Curriculum-->
    <div class="modal fade text-left" id="availableCurriculum" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel110">Subir Curriculum</h5>
                    <a data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </a>
                </div>

                <form method="POST" action="{{route('employee.profile.upload-curriculum')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row ml-1 mr-2">
                            <input type="file" name="archivo" required>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <input class="btn btn-primary waves-effect waves-light" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>






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



</div>
</div>
</div>
</div>
</div>

@endsection