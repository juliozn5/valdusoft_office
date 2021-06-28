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
        <div class="content-header row"> </div>
       
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Nóminas</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.payrolls.list') }}">Financiero</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.payrolls.list') }}">Nómina</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">

        <div id="table-head">
            <div class="col-11" style="margin-left:15px">
            
                <div class="card" id="card-head1">

                <div class="ml-1 mt-2 mb-2 flex-nowrap">
                <p class="h6">Fecha de inicio</p>
                <input type="text" class="col-4 form-control " placeholder="<!--f133;unicode--> Selecciona una fecha" aria-describedby="addon-wrapping">
                </div>


                    <div class="card-header">
                        <h3 class="card-title mb-1">Empleados</h3>
                    </div>

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light ">

                                    <tr>
                                        <th>NOMBRE</th>
                                        <th>VALOR DE HORA</th>
                                        <th>COSTO DE HORA</th>
                                        <th>TOTAL</th>
                                        <th>TOTAL</th>
                                        <th>BONO</th>
                                        <th>PRESTAMO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>

                                     <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>


                                    <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>


                                    <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td scope="row">Fernando Torres</td>
                                        <td><input type="text" class="col-6 form-control"></td>
                                        <td>4</td>
                                        <td></td>
                                        <td><a href="#"></a>
                                        <a href="#"></a>
                                        </td>

                                    </tr>


                                </tbody>
                            </table>
                            <br>

                            <div class="bottom float-right" style="margin-right:20px;">

                                <button class="btn  btn-primary ">GENERAR</button>
                                <br><br>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection