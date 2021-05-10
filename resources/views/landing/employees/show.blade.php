@extends('layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">Empleados</div>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.employees') }}">Empleados</a></li>
                                    <li class="breadcrumb-item">Detalle del Empleado</li>
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
                                <h3 class="card-title mb-2">{{ $employee->name }} {{ $employee->last_name }}</h3>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
