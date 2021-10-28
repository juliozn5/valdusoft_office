@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
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
                <div class="card">
                    <div class="container">
                        <div class="row">
                            @foreach ($proyects_user as $item)
                            <a href="{{ route('employee.projects.show', [$item->slug, $item->id]) }}" title="Ir al proyecto {{$item->name}}">
                             
                                <div class="card container-fluid" style="width: 18rem;" id="recomiendo">
                                    <img src="{{ asset('uploads/images/projects/'.$item->logo) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class=" h4 pb-2 " id="shadow">
                                            <div class="ml-1  text-white" style="position: relative;top: 14px;"> {{$item->name}}</div><a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="card p-2">
                    <div class="">
                        <div class="card-body">
                            <img src="{{ asset('images/figma/group_154.png') }}" class="float-right pl-2" width="120" height="120" alt="">
                            <h6 class="pt-2">Ultima factura de la quincena</h6>
                            @if ($lastBill != NULL)
                            <a href="{{ route('employee.bills.download', $lastBill->id) }}" class="btn btn-primary mt-1 pb-1" target="_blank" @if (is_null($lastBill)) disabled @endif><b>Descargar</b></a>
                            @else
                            <a href="#" class="btn btn-primary mt-1 pb-1"><b>Sin facturas</b></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card p-2">
                    <div class="">
                        <div class="card-body">
                            <img src="{{ asset('images/figma/dolar.png') }}" class="float-right pl-2" width="120" height="120" alt="">
                            <h5 class="pt-2">Valor de la hora de trabajo</h5>
                            <br>
                            <p class="h4" id="holidays-date">$ @isset($user->price_per_hour) {{number_format($user->price_per_hour, 2, ',', '.')}} @else 0,00 @endisset</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card p-2">
                    <div class="">
                        <div class="card-body">
                            <img src="{{ asset('images/svg/ilustracion_clientes.svg') }}" class="float-right pl-2" width="120" height="120" alt="">
                            <h5 class="pt-2">Proximas <br> Vacaciones</h5>
                            <br>
                            <p class="h5 " id="holidays-date"><i class="far fa-calendar icon-big mr-1"></i>{{$fechaUser->toFormattedDateString()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
@endsection