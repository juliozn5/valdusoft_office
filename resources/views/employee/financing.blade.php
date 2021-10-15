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
        <section class="hosting">
            <div class="row" id="table-head">
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header" style="background-color: white">
                            <h3 class="card-title mb-2">Financiamiento</h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-gris">
                                        <tr>
                                            <th>FECHA</th>
                                            <th>DEUDA</th>
                                            <th>ABONO</th>
                                            <th>PEDIENTE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employes as $item)
                                        <tr>
                                            <td>{{date('d/m/Y', strtotime($item->date))}}</td>
                                            <td>{{$item->total_hours}}</td>
                                            <td>{{$item->price_by_hour}}</td>
                                            <td>{{$item->total_amount}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mr-3">
                                {{$employes->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="">
                            <div class="card-body p-1">
                                <img src="{{ asset('images/svg/ilustracion_clientes.svg') }}" class="float-right pl-2" width="120" height="120" alt="">
                                <h5 class="pt-2">Próximas <br> Vacaciones</h5>
                                <br>
                                <p class="h4 " id="holidays-date"><i class="far fa-calendar icon-big mr-1"></i>{{$fechaUser->toDateString()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection