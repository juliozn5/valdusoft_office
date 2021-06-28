@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Pagos</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.payments.list') }}">Financiero</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.payments.list') }}">Pagos</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">

        <div >
            <div class="" style="margin-left:15px; width:980px;">
                <div class="card" id="card-head1">
                    <div class="card-header">
                        <h3 class="card-title mb-1">Pagos</h3>
                        <a href="#" class="btn btn-primary  mb-2 waves-effect waves-light" data-toggle="modal" data-target="#exampleModalToggle"><i class="feather icon-plus "></i>&nbsp; Agregar Nuevo</a>
                    </div>

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light ">
                                    <tr>
                                    <th scope="col"># DE FACTURA</th>
                                        <th scope="col">FECHA</th>
                                        <th scope="col">CLIENTE</th>
                                        <th scope="col">PLATAFORMA DE PAGO</th>
                                        <th scope="col">MONTO</th>
                                        <th scope="col">FEE</th>
                                        <th>ESTADO</th>
                                        <th>ACCIÓN</th>
                                        <th scope="col">TOTAL</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/valdusoft/paypal.png')}}" alt=""></td>
                                        <td>20.36$</td>
                                        <td>---</td>
                                        <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                        <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>    
                                        <td><img src="{{asset('images/figma/l.uphold.png')}}" alt=""></td>
                                        <td>20.36$</td>
                                        <td>---</td>
                                          <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                          <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/valdusoft/paypal.png')}}" alt=""></td>
                                        <td>20.36$</td>         
                                        <td>---</td>
                                        <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                        <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/figma/l.uphold.png')}}" alt=""></td>
                                        <td>20.36$</td>
                                        <td>---</td>
                                        <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                        <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>
                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/valdusoft/paypal.png')}}" alt=""></td>
                                        <td>20.36$</td>
                                        <td>---</td>
                                        <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                        <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/figma/l.uphold.png')}}" alt=""></td>
                                        <td>147$</td>
                                        <td>---</td>
                                        <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                        <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/valdusoft/paypal.png')}}" alt=""></td>
                                        <td>20.36$</td>
                                         <td>---</td>
                                         <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                         <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/figma/l.uphold.png')}}" alt=""></td>
                                        <td>20.36$</td>                                        
                                        <td>---</td>
                                        <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                        <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/valdusoft/paypal.png')}}" alt=""></td>
                                        <td>20.36$</td>
                                        <td>---</td>
                                        <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                        <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/figma/l.uphold.png')}}" alt=""></td>
                                        <td>20.36$</td>
                                        <td>---</td>
                                        <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                        <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                    <tr>
                                    <td>1587</td>
                                        <th scope="row">03/09/21</th>
                                        <td>Pedro Perez</td>
                                        <td><img src="{{asset('images/valdusoft/paypal.png')}}" alt=""></td>
                                        <td>20.36$</td>
                                        <td>---</td>
                                        <th><label class="label status-label status-label-gray">En Proceso</label></th>
                                        <th><a href="#"><i class="far fa-eye ml-1"></i></a></th>
                                        <td>147$</td>
                                    </tr>

                                </tbody>
                            </table>

                            <div class="bottom float-right" style="margin-right:20px;">

                                <button class="btn  btn-circle btn-lg "><i style="color:black;" class="fas fa-angle-left"></i>

                                </button>

                                <button class="btn btn-primary  btn-circle btn-lg">1

                                </button>

                                <button style="color:black;" class="btn btn-circle btn-lg">2

                                </button>

                                <button class="btn  btn-circle btn-lg "><i style="color:black;" class="fas fa-angle-right"></i>

                                </button>
                                <br><br>

                            </div>
                        </div>
                    </div>


                        <!--MODAL CONTENT-->
                        <div class="container">
                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                    
                    <h5 class="modal-title" id="exampleModalToggleLabel">@Abraham</h5>
                    <button  class="close mr-1" style="margin-top:1px;" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>

                    <div class="modal-body">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta rerum nam commodi ea tenetur doloribus incidunt vero iure, reiciendis numquam nisi cupiditate nostrum illo odio quo impedit amet accusantium.
                         </div>

                      <div class="modal-footer">

                      <button type="button" class="btn btn-secundary text-dark" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>

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