@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        
        <div class="content-header row">
        </div>
        <div class="content-body">


            <div class="card">
                <div class="ml-1 mb-1 mt-1">
                    <h3>Proyectos</h3>
                </div>
                <div class="">



                    <div class="card">
                        <div class="row ">

                            <div class="container col-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2  text-white" id="shadow">
                                    <div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>

                            <div class="container col-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">
                                    <div style="
                                   position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>

                            <div class="container col-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">
                                    <div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>
                            <div class="container col-2  rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">
                                    <div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>

                            <div class="container col-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">
                                    <div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <section class="employes-home">
                <div class="row">
                    <div class="col-4">
                        <div class="card p-xl" style="height: 80%">
                            <div class="card-body">
                                <h5 class="col-6">Ultima Factura de la quincena</h5>
                                <br>
                                <a href="#" class="btn btn-primary">Descargar</a>
                                <div class=""><img src="{{asset('/images/figma/group_154.png')}}" style="position:absolute;margin-left: 155px;
                                top: 18px;
                                height: 125px;" alt=""></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="card p-xl" style="height: 80%">
                            <div class="card-body">
                                <h5 class="col-6">Valor de la hora de trabajo</h5>
                                <br>
                                <p class="h4 " id="holidays-date"><i class="far icon-big mr-1"></i>$ 0.00</p>
                                <img src="{{asset('/images/figma/dolar.png')}}" style="position:absolute;margin-left: 130px;
                            top: 8px;
                            height: 132px;" alt="">

                            </div>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="card p-xl" style="height: 80%">
                            <div class="card-body">
                                <h5 class="col-6 mt-1">Proximas <br> Vacaciones</h5>
                                <br>
                                <p class="h4 " id="holidays-date"><i class="far fa-calendar icon-big mr-1"></i>30 Agosto</p>
                                <img src="{{asset('/images/svg/ilustracion_clientes.svg')}}" style="position:absolute;margin-left: 150px;
                            top: 5px;
                            height: 140px;" alt="">

                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>
</div>
</section>

</div>
</div>
</div>

<!-- END: Content

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
-->
<!-- BEGIN: Footer
<footer class="footer footer-static footer-dark">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="https://valdusoft.com" target="_blank">Valdusoft,</a>All rights Reserved</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>-->
<!-- END: Footer-->
@endsection