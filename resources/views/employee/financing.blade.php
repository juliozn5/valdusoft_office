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
                                      <thead class="thead-gris text-center">
                                         <tr>
                                           <th>FECHA</th>
                                           <th>DEUDA</th>
                                           <th>ABONO</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        @if (!is_null($financing))
                                            @if (!is_null($financing->financing_payments))
                                                @foreach ($financing->f as $item)
                                                    <tr class="text-center">
                                                        <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                                        <td>{{number_format($item->total_amount, 2, ',', '.')}}</td>
                                                        <td>{{number_format($item->total_payments, 2, ',', '.')}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3">No tiene abonos aun en su financiamiento...</td>
                                                </tr>
                                            @endif
                                        @else
                                            <tr>
                                                <td colspan="3">No tienen ningun financiamiento activo...</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
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
     </section>
   </div>
</div>
@endsection