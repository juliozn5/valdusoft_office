@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-body">
                    <div class="card">
                        <div class="ml-1 mb-1 mt-1">
                            <h3>Proyectos</h3>
                        </div>
<div class="card">
    <div class="row ">
        <div class="container col-md-2 col-sm-1 mb-2 rounded">
            <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
                <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                    <div style="position: relative;top: 14px;"> Recomiendo</div>
                </div>
        </div>
<div class="container col-md-2 col-sm-1 mb-2 rounded">
    <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
        <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
            <div style="position: relative;top: 14px;"> Recomiendo</div>
        </div>
</div>
<div class="container col-md-2 col-sm-1 mb-2 rounded">
    <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
        <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
            <div style="position: relative;top: 14px;"> Recomiendo</div>
        </div>
</div>
<div class="container col-md-2 col-sm-1 mb-2  rounded">
    <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
        <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
            <div style="position: relative;top: 14px;"> Recomiendo</div>
        </div>
</div>
<div class="container col-md-2 col-sm-1 rounded">
    <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="" style="width:100%;">
        <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
            <div style="position: relative;top: 14px;"> Recomiendo</div>
        </div>
</div>
    </div>
        </div>
            </div>
                </div>
<section class="employes-home mt-5">
    <div class="row">
        <div class="col-md-4 col-sm-1 mb-2">
            <div class="card" style="height: 80%">
                <div class="card-body">
                    <h5 class="col-6">Ultima Factura de la quincena</h5>
                    <br>
                    <a href="#" class="btn btn-primary ml-1">Descargar</a>
                    <div class=""><img src="{{asset('/images/figma/group_154.png')}}" style="position:absolute;margin-left: 155px;top: 18px;height: 125px;" alt=""></div>
                </div>
            </div>
        </div>
<div class="col-md-4 col-sm-1 mb-2">
    <div class="card" style="height: 80%">
        <div class="card-body">
            <h5 class="col-6">Valor de la hora de trabajo</h5>
            <br>
            <p class="h4 " id="holidays-date"><i class="far icon-big mr-1"></i>$ 0.00</p>
            <img src="{{asset('/images/figma/dolar.png')}}" style="position:absolute;margin-left: 130px;top:8px;height: 132px;" alt="">
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-1 mb-2">
    <div class="card" style="height: 80%">
        <div class="card-body">
            <h5 class="col-6">Proximas <br> Vacaciones</h5>
            <br>
            <p class="h4 " id="holidays-date"><i class="far fa-calendar icon-big mr-1 mt-1"></i>30 Agosto</p>
            <img src="{{asset('/images/svg/ilustracion_clientes.svg')}}" style="position:absolute;margin-left:150px;top: 5px;height: 140px;" alt="">
        </div>
    </div>
</div>
    </div>
        </div>
            </div>
@endsection