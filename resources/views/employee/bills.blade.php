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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                       <div class="col-12">
                            <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                                Listado de Facturas
                            </div>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('employee.home') }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Financiero</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('employee.bills.list') }}">Facturas</a>
                                </ol>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>

            <div class="content-body">
                <div class="row" id="table-head">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Mis Facturas</h3>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <th>#</th>
                                            <th>FECHA</th>
                                            <th>MONTO</th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($bills as $bill)
                                                <tr>
                                                    <th scope="row">#{{ $bill->id }}</th>
                                                    <td>{{ date('d-m-Y', strtotime($bill->date)) }}</td>
                                                    <td>{{ number_format($bill->amount, 2, '.', ',') }}</td>
                                                    <td>
                                                        @if ($bill->status == 0)
                                                            <label class="label status-label status-label-purple">Pendiente</label>
                                                        @else
                                                            <label class="label status-label status-label-green">Pagada</label>
                                                        @endif
                                                    </td>
                                                    <td><a href="{{ route('employee.bills.show', $bill->id) }}"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mr-3">
                                    {{ $bills->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
@endsection