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
                                    <thead class="thead-light">
                                        <tr>
                                            <th># <i class="fas fa-sort"></i></th>
                                            <th>FECHA <i class="fas fa-sort"></i></th>
                                            <th>MONTO <i class="fas fa-sort"></i></th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bills as $bill)
                                        <tr>
                                            <th scope="row">#{{ $bill->id }}</th>
                                            <td>{{ $bill->date }}</td>
                                            <td>{{ $bill->amount }}$</td>
                                            <td>
                                                <div class="text-center text-white d-inline-block mr-2">
                                                    <div class="project-detail-skill" id="process-project">En proceso</div>
                                            </td>
                                            <td><a href="{{ route('client.bills.detail') }}"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
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