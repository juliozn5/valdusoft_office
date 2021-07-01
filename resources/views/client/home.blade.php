@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body mb-5 mt-2">
            <div class="card">
                <div class="ml-1 mb-1 mt-1">
                    <h3>Proyectos</h3>
                </div>

                <style>
                    .container-x {
                        font-size: calc(1em + 1vw);
                        width: 100%;

                    }
                </style>

                <div class="card">
                    <div class="container">
                        <div class="row ">
                            <div class="container-fluid col-md-2 col-sm-1 mb-2 rounded" id="recomiendo">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>
                            <div class="container-fluid  col-md-2 col-sm-1 mb-2 rounded" id="recomiendo">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>
                            <div class="container-fluid col-md-2 col-sm-1 mb-2 rounded" id="recomiendo">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>
                            <div class="container-fluid col-md-2 col-sm-1 mb-2  rounded" id="recomiendo">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>
                            <div class="container-fluid col-md-2 col-sm-1 rounded" id="recomiendo">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                    <div style="position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card ">
            <div class="">
                <h3 class="card-title mb-2 pl-2 pt-2">Facturas</h3>
                <div class="table-responsive ">
                    <table class="table">
                        <thead class="thead-light ">
                            <th>FECHA</th>
                            <th class="col-7">DESCRIPCIÓN</th>
                            <th class="col-1">MONTO</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>05 May 2021</td>
                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                <td>640$</td>
                            </tr>
                            <tr>
                                <td>05 May 2021</td>
                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                <td>640$</td>
                            </tr>
                            <tr>
                                <td>05 May 2021</td>
                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                <td>640$</td>
                            </tr>
                            <tr>
                                <td>05 May 2021</td>
                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                <td>640$</td>
                            </tr>
                            <tr>
                                <td>05 May 2021</td>
                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                <td>640$</td>
                            </tr>
                            <tr>
                                <td>05 May 2021</td>
                                <td><span style="color: #650865; font-size: 15px; font-weight: 500;">Pago de ejemplo</span><br>Completado</td>
                                <td>640$</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="content-body">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-2">Hosting</h3>
                    <div class="container pb-2">
                        <div class="row container-xxl">
                            <div class="card-body rounded" id="igual" id="hos" style="background: #252856;">
                                <img class="float-right" src="{{asset('images/icons/background.png')}}" alt="">
                                <h5 class="card-title text-white">Recomiendo.com</h5>
                                <br>
                                <p class="card-text h6 text-white">Fecha de renovación</p>
                                <br>
                                <p class="h4 text-white"><i class="far fa-calendar icon-big mr-1"></i>02/10/2021</p>
                            </div>

                            <div class="card-body rounded" id="igual" id="ting" style="background: #252856;margin-left:2px;">
                                <img class="float-right" src="{{asset('images/icons/background.png')}}" alt="">
                                <h5 class="card-title text-white">Recomiendo.com</h5>
                                <br>
                                <p class="card-text h6 text-white">Fecha de renovación</p>
                                <br>
                                <p class="h4 text-white"><i class="far fa-calendar icon-big mr-1"></i>02/10/2021</p>
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




<style>
#igual{
    margin: 0px 15px 0px 0px;
}
#hos{
    margin: 0px 15px 0px 15px;
}


@media only screen and (max-width: 800px) {
   
    #igual{
        margin:0px 10px 20px 0px;
}
}
  
@media only screen and (max-width: 575px) {
   
   #recomiendo{
       margin:50px 0px 0px 0px;
}
}

   
</style>