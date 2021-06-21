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
                        <!--<h2 class="content-header-title float-left mb-0">Hosting</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('client.home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('client.hostings.list') }}">Hosting</a>
                                </li>
                            </ol>
                        </div>-->
                    </div>
                </div>
            </div>

        </div>

        <div class="content-body">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Hosting</h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light text-center">
                                        <tr>
                                            <th>DOMINIO</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>CLIENTES</th>
                                            <th>AÑOS</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>Diego Tellez</td>
                                            <td>1</td>

                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                            </td>
                                        </tr>

                                        </tr>

                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>Diego Tellez</td>
                                            <td>1</td>

                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                            </td>
                                        </tr>

                                        </tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>Diego Tellez</td>
                                            <td>1</td>

                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                            </td>
                                        </tr>

                                        <tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>Diego Tellez</td>
                                            <td>1</td>

                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                            </td>
                                        </tr>

                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>Diego Tellez</td>
                                            <td>1</td>

                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                            </td>
                                        </tr>

                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>Diego Tellez</td>
                                            <td>1</td>

                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                            </td>
                                        </tr>

                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>Diego Tellez</td>
                                            <td>1</td>

                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>Diego Tellez</td>
                                            <td>1</td>

                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                            </td>
                                        </tr>

                                        </tr>
                                        <tr>
                                            <td>trovimo.com</td>
                                            <td>03/09/21</td>
                                            <td>Diego Tellez</td>
                                            <td>1</td>

                                            <td><a href=""><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a href=""><img id="bottom" src="{{asset('images/svg/edit.svg')}}" alt=""></a>
                                            </td>
                                        </tr>

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
                                </div>
                                <br><br><br>
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