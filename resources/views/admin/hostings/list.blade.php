@extends('layouts.app')

@section('content')
@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush
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
                        <h2 class="content-header-title float-left mb-0">Hosting</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.hostings.list') }}">Hosting</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<div class="content-body">
    <div id="table-head">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-1">Hosting</h3>
                    <a href="{{ route('admin.hostings.create') }}" class="btn btn-primary mb-2 waves-effect waves-light"> Agregar nuevo proyecto</a>
                </div>
<div class="card-content">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead class="thead-light">
                <tr class="">
                    <th>Domino</th>
                    <th>FECHA DE INICIO</th>
                    <th>CLIENTES</th>
                    <th>AÑOS</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hostings as $hosting)
                <tr>
                    <td>{{ $hosting->url }}</td>
                    <td>{{ date('d-m-Y', strtotime($hosting->create_date)) }}</td>
                    <td>{{ $hosting->user->name }} {{ $hosting->user->last_name }}</td>
                    <td>
                        {{ (is_null($hosting->due_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($hosting->due_date)) }}
                    </td>
                    <td>
                        <a href="#"><i class="fa fa-eye mr-1 action-icon"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div class="mr-3">                               
</div>
    </div>
        </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection