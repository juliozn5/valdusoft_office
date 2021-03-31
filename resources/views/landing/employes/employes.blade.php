@extends('layouts.app')

@section('content')

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
                        <h2 class="content-header-title float-left mb-0">Empleados</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('landing.employes') }}">Empleados</a>
                                </li>
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
                            <h3 class="card-title mb-2">Tabla de empleados</h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Cargo</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            @if(!$item->getMedia('photo')->isEmpty())
                                            <th><img class="rounded-circle" width="50px" height="50px" src="{{ $item->photoUrl }}" /></th>
                                            @else
                                            <th><img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft.png') }}" /></th>
                                            @endif
                                            <td>{{ $item->name }}</td>
                                            @if($item->position === '0')
                                            <td>Desarrollador</td>
                                            @elseif($item->position === '1')
                                            <td>Diseñador</td>
                                            @elseif($item->position === '2')
                                            <td>Project Manager</td>
                                            @elseif($item->position === '3')
                                            <td>Financiero</td>
                                            @endif
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
