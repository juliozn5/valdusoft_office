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
                    <div class="card-header">
                        <h3 class="card-title mb-1">Empleados</h3>
                        <a href="{{ route('admin.payrolls.generate') }}" class="btn btn-primary mb-2 waves-effect waves-light">&nbsp; <strong>GENERAR FACTURA</strong></a>
                    </div>

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">

                                    <tr>
                                        <th class="text-center">NOMBRE</th>
                                        <th class="text-center">UPHOLD</th>
                                        <th class="text-center">HORAS</th>
                                        <th class="text-center">PRECIO HORA NORMAL</th>
                                        <th class="text-center">TOTAL QUINCENA</th>
                                        <th class="text-center">BONOS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($employees as $item)
                                     <tr>
                                        <td class="text-center">{{$item->user->name}}</td>
                                        <td class="text-center">{{$item->user->uphold_account}}</td>
                                        <td class="text-center">{{$item->total_hours}}</td>
                                        <td class="text-center">{{number_format($item->price_by_hour, 2, ',', '.')}} $</td>       
                                        <td class="text-center">{{$item->total_amount}}</td>
                                        <td class="text-center">{{$item->total_amount}}</td>
                                        
                                    </tr>  
                                  @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- <div class="float-right mr-3 mb-2">
                            <strong>TOTAL</strong>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>









    </div>
    @endsection