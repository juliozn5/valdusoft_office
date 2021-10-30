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
                                            <th># <i class="fas fa-sort"></i></th>
                                            <th>FECHA <i class="fas fa-sort"></i></th>
                                            <th>MONTO <i class="fas fa-sort"></i></th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">


                                        @foreach ($bills as $bill)
                                        <tr>
                                            <th scope="row">#{{ $bill->id }}</th>
                                            <td>{{ $bill->date }}</td>
                                            <td>{{ $bill->amount }}$</td>
                                            <td>
                                                @if ($bill->status == 0)
                                                    <label class="label status-label status-label-purple">Pendiente</label>
                                                @else
                                                    <label class="label status-label status-label-green">Completado</label>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('client.bills.show', $bill->id) }}"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                <a class="ml-1 mt-1 btn btn-primary btn-sm btn-download-invoice mb-75" href="{{ route('client.bills.download', $bill->id) }}" target="_blank">
                                                    <i class="fas fa-download"></i>
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
        </section>
    </div>
</div>
@endsection
