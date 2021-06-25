@extends('layouts.app')

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                            Clientes</div>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.clients.list') }}">Clientes</a></li>
                                <li class="breadcrumb-item">Detalle del Cliente</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">

            <div class="card">

                <div class="card-header mb-3">

                    <div class="row" id="all-center-items">

                        <div class="col-md-4">

                            <img class="rounded-circle" src="{{ asset('images/user/logonew.png')}}" alt="" width="55px" height="55px">
                        </div>

                    </div>

                    <div class="col ml-1">
                        <h3 class="card-title mb-1">Smart Bunny</h3>
                        +5735021596 / info@smartbunny.com

                    </div>

                </div>


                <div class="ml-1 mb-3 mt-1">
                    <h5>Proyectos asignados</h5>
                </div>
                <div>


                    <div class="card">
                        <div class="row ">

                            <div class="container col-md-2 col-sm-1 mb-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>

                            <div class="container col-md-2 col-sm-1 mb-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="
                                   position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>

                            <div class="container col-md-2 col-sm-1 mb-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>
                            <div class="container col-md-2 col-sm-1 mb-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>

                            <div class="container col-md-2 col-sm-1 mb-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>
                        </div>

                    <div class="card-header">
                        <h3 class="card-title mb-2">Hosting</h3>
                        <div class="container pb-2">
                            <div class="row col-md-12">
                                <div class="card-body rounded" style="background: #252856;">
                                    <img class="float-right align-self-end" src="{{asset('images/icons/background.png')}}" alt="" style="position: absolute; margin-left:300px;">
                                    <p class="card-text h6 text-white">Fecha de Renovación</p>
                                    <br>
                                    <p class="h4 text-white"><i class="far fa-calendar icon-big mr-1"></i>02/10/2021</p>
                                    
                                    <a type="submit" class="btn" id="btn-guardar" style="background-color:#FF4D00;color: white;width: 180px;"><img src="{{asset('images/valdusoft/cpanel-logo.png')}}" style="width: 19px;" alt="" class="mr-1" >Ir al Cpanel</a>
                                    
                                    <a type="submit" class="btn ml-1" id="btn-guardar" style="background-color:#06B054;
                                    ;color: white;width: 180px; "><img src="{{asset('images/valdusoft/refresh.png')}}" alt="" class="mr-1"> Renovar</a>
                                </div>

                                <div class="card-body rounded ml-1" style="background: #252856;">
                                    <img class="float-right align-self-end" src="{{asset('images/icons/background.png')}}" alt="" style="position: absolute; margin-left:300px;">
                                    <p class="card-text h6 text-white">Fecha de Renovación</p>
                                    <br>
                                    <p class="h4 text-white"><i class="far fa-calendar icon-big mr-1"></i>02/10/2021</p>
                                    
                                    <a type="submit" class="btn" id="btn-guardar" style="background-color:#FF4D00;color: white;width: 180px;"><img src="{{asset('images/valdusoft/cpanel-logo.png')}}" style="width: 19px;"alt="" class="mr-1" >Ir al Cpanel</a>
                                    
                                    <a type="submit" class="btn ml-1" id="btn-guardar" style="background-color:#06B054;
                                    ;color: white;width: 180px; "><img src="{{asset('images/valdusoft/refresh.png')}}" alt="" class="mr-1" >Renovar</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-header">
                        <h3 class="card-title mb-2">Dominios</h3>
                        <div class="container pb-2">
                            <div class="row col-md-12">
                                <div class="card-body rounded" style="background: #252856;">
                                    <img class="float-right align-self-end" src="{{asset('images/valdusoft/world.png')}}" alt="" style="position: absolute; margin-left:300px;">
                                    <p class="card-text h6 text-white">Fecha de Renovación</p>
                                    <br>
                                    <p class="h4 text-white"><i class="far fa-calendar icon-big mr-1"></i>02/10/2021</p>
                                    
                                    <a type="submit" class="btn" id="btn-guardar" style="background-color:#0065DC;color: white;width: 180px;"><img src="{{asset('images/valdusoft/admin.png')}}" alt="" class="mr-1">Ir al Cpanel</a>
                                    
                                    <a type="submit" class="btn ml-1" id="btn-guardar" style="background-color:#06B054;
                                    ;color: white;width: 180px; "><img src="{{asset('images/valdusoft/refresh.png')}}" alt="" class="mr-1"> Renovar</a>
                                </div>

                                <div class="card-body rounded ml-1" style="background: #252856;">
                                    <img class="float-right align-self-end" src="{{asset('images/valdusoft/world.png')}}" alt="" style="position: absolute; margin-left:300px;">
                                    <p class="card-text h6 text-white">Fecha de Renovación</p>
                                    <br>
                                    <p class="h4 text-white"><i class="far fa-calendar icon-big mr-1"></i>02/10/2021</p>
                                    
                                    <a type="submit" class="btn" id="btn-guardar" style="background-color:#0065DC;color: white;width: 180px;"><img src="{{asset('images/valdusoft/admin.png')}}" alt="" class="mr-1" >Ir al Cpanel</a>
                                    
                                    <a type="submit" class="btn ml-1" id="btn-guardar" style="background-color:#06B054;
                                    ;color: white;width: 180px; "><img src="{{asset('images/valdusoft/refresh.png')}}" alt="" class="mr-1" >Renovar</a>
                                </div>
                            </div>
                        </div>
                    </div>



            <div>
                <div>
                    <h3 class="card-title mb-2 pl-2 pt-2">Facturas</h3>
                    <div class="table-responsive ">
                        <table class="table">
                            <thead class="thead-light ">
                                <th class="col-1">#</th>
                                <th class="col-3">FECHA</th>
                                <th class="col-2">MONTO</th>
                                <th class="col-2">ESTADO</th>
                                <th class="col-2">ACCION</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">#125</th>
                                    <td>05 Sep</td>
                                    <td>20.36$</td>
                                    <td>
                                        <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                    </td>
                                    <td>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#126</th>
                                    <td>05 Sep</td>
                                    <td>20.36$</td>
                                    <td>
                                        <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                    </td>
                                    <td>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#127</th>
                                    <td>05 Sep</td>
                                    <td>20.36$</td>
                                    <td>
                                        <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                    </td>
                                    <td>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#128</th>
                                    <td>05 Sep</td>
                                    <td>20.36$</td>
                                    <td>
                                        <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                    </td>
                                    <td>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#129</th>
                                    <td>05 Sep</td>
                                    <td>20.36$</td>
                                    <td>
                                        <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                    </td>
                                    <td>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#130</th>
                                    <td>05 Sep</td>
                                    <td>20.36$</td>
                                    <td>
                                        <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                    </td>
                                    <td>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#131</th>
                                    <td>05 Sep</td>
                                    <td>20.36$</td>
                                    <td>
                                        <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                    </td>
                                    <td>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#132</th>
                                    <td>05 Sep</td>
                                    <td>20.36$</td>
                                    <td>
                                        <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                    </td>
                                    <td>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#133</th>
                                    <td>05 Sep</td>
                                    <td>20.36$</td>
                                    <td>
                                        <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                    </td>
                                    <td>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/plug.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                        <a href="#"><img id="bottom" src="{{asset('images/figma/puntos.png')}}" alt=""></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bottom float-right" style="margin-right:20px; height:100px; ">

                    <button class="btn  btn-circle btn-lg "><i style="color:black;" class="fas fa-angle-left"></i>

                    </button>

                    <button class="btn btn-primary  btn-circle btn-lg">1

                    </button>

                    <button style="color:black;" class="btn btn-circle btn-lg">2

                    </button>

                    <button class="btn  btn-circle btn-lg "><i style="color:black;" class="fas fa-angle-right"></i>


                    </button>
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