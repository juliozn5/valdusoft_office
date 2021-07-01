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
                    <div class="card-header">
                        <img class="rounded-circle ml-2" src="{{ asset('images/user/Ellipse.png')}}" alt="" width="55px" height="55px">
                        <div class="col ml-1">
                        <h3 class="card-title mb-1">{{ $user->name }}</h3>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
<div class="card-body">
    <!--ASSIGNED PROJECTS-->
    <!--PROJECT 1-->
    <div class="pl-2 pr-2">
        <div class="project-detail-titles">Proyectos Asignados</div>
            <div class="mt-1">
                <!--PROJECT 1-->
                <div class="text-center text-white d-inline-block mr-1">
                    <div class="project-circle" style="background:#FF3F3F;">P1</div>
                </div>
                <!--PROJECT 2-->
                <div class="text-center text-white d-inline-block mr-1">
                    <div class="project-circle" style="background:#12A0B4;">P2</div>
                </div>
                <!--PROJECT 3-->
                <div class="text-center text-white d-inline-block mr-1">
                    <div class="project-circle" style="background:#940385;">P3</div>
                </div>
            </div>
    </div>
<!--DATE SECTION-->
<!--DATE OF BIRTH-->
<div class="row mt-3 pl-2 pr-2">
    <div class="col-md-3 col-sm-1">
        <div class="project-detail-titles">Fecha de Nacimiento</div>
            <div class="mt-1 project-detail-dates">
            <img class="rounded-circle" src="{{ asset('images/svg/calendar.svg')}}">
            <span>{{ $user->birthdate}}</span>
            </div>
        </div>
<!--DATE OF ADMISSION-->
<div class="col-md-3 col-sm-1">
    <div class="project-detail-titles">Fecha de Ingreso</div>
        <div class="mt-1 project-detail-dates">
            <img class="rounded-circle" src="{{ asset('images/svg/calendar.svg')}}">
               <span>{{ $user->admission_date}}</span>
            </div>
        </div>
<!--NEXT VACATIONS-->
<div class="col-md-3 col-sm-1">
    <div class="project-detail-titles">Próximas Vacaciones</div>
        <div class="mt-1 project-detail-dates">
            <img class="rounded-circle" src="{{ asset('images/svg/calendar.svg')}}">
               <span>{{ $user->birthdate}}</span>
        </div>
    </div>
</div>
<!--SKILLS SECTION-->
<div class="mt-3 pl-2 pr-2">
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

<div class="modal fade text-left" id="availableSkills" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel110">Modificar Skills</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="mt-3">
    <div class="project-detail-titles"><strong>Curriculum Vitae<strong></div>
        <div class="mt-1">
            <div class="col-md-4 ml-2 position-absolute"><span>{{ $user->curriculum}}</span></div>
        </div>
            <a href="#"><img class="mb-4" src="{{asset('images/icons/arrow-down.png')}}" alt=""></a>
</div>
    <div class="row">
        <div class="col-md-3 col-sm-1">
            <div class="project-detail-titles"><strong>Precio Por Hora</strong></div>
                <div class="mt-1 project-detail-dates">
                    <img src="{{ asset('images/icons/dollar.png')}}" alt="" class="mr-1"><span>{{ $user->price_per_hour}} USDT</span>
                </div>
            </div>
        <div class="col-md-6 col-sm-1 mr-3">
            <div class="project-detail-titles"><strong>Billetera USDT Red tron<strong></div>            
                <div class="mt-1 project-detail-dates">
                    <img src="{{ asset('images/icons/uphold.png')}}" alt="" class="mr-1"><span>{{ $user->tron_wallet}}</span>
                    <a href="#availableWallet" data-toggle="modal">
                        <img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Tecnología" height="40" width="40">
                    </a>
                </div>

                <div class="modal fade text-left" id="availableWallet" tabindex="-1" role="dialog" aria-modal="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary white">
                                <h5 class="modal-title" id="myModalLabel110">Modificar Billetera</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                                <form method="POST" action="{{route('employee.profile.update-wallet')}}">
                                    @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="modal-body">
                                    <div class="row ml-1 mr-2">
                                    <input class="form-control" type="text" name="tron_wallet" value="{{ $user->tron_wallet}}">
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
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
            </div>
                </div>
            </div>
        </div>

@endsection