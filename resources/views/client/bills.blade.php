@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row" id="table-head">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Facturas</h3>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-light text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>FECHA</th>
                                                <th>MONTO</th>
                                                <th>ESTADO</th>
                                                <th>ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($bills as $bill)
                                                <tr>
                                                    <th scope="row">#{{ $bill->id }}</th>
                                                    <td>{{ date('d-m-Y', strtotime($bill->date)) }}</td>
                                                    <td>{{ number_format($bill->amount, 2, '.', ',') }}</td>
                                                    <td>
                                                        @if ($bill->status == 0)
                                                            <label class="label status-label status-label-purple">Pendiente</label>
                                                        @elseif ($bill->status == 1)
                                                            <label class="label status-label status-label-blue">Pagada</label>
                                                        @elseif($bill->status == 2)
                                                            <label class="label status-label status-label-green">parcialmente pagada</label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('client.bills.show', $bill->id) }}">
                                                            <i class="fa fa-eye action-icon"></i>
                                                        </a>
                                                        <a href="{{ route('client.bills.download', $bill->id) }}" target="_blank">
                                                            <i class="far fa-file-pdf action-icon ml-1"></i>
                                                        </a>
                                                        <a href="{{ route('client.bills.downloadPDF', $bill->id) }}" target="_blank">
                                                            <i class="ml-1 fas fa-download action-icon"></i>
                                                        </a>
                                                    </td>
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
        </div>
    </div>
@endsection
