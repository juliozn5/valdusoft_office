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
                                        {{-- @foreach ($financing as $item) --}}
                                          <tr class="text-center">
                                            <td>{{ $financing->payroll->dead_line }}</td>
<<<<<<< HEAD
                                            @if ($financing->payroll->status == 1)
                                            <td>{{ $financing->total_amount / 100 * $financing->percentage  }}$</td>
                                            <td>{{ $financing->payroll->amount }}$</td>
                                            @else
                                            <td>Procesando</td>
                                            <td>Procesando</td>
                                            @endif
=======
                                            <td>{{ $financing->total_amount / 100 * $financing->percentage  }}$</td>
                                            <td>{{ $financing->total_amount }}$</td>
>>>>>>> ee4f06f2626593ad4af2754bd54027e453929e93
                                          </tr>
                                        {{-- @endforeach --}}
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