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
                        <h2 class="content-header-title float-left mb-0">Proyectos</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('landing.projects') }}">Proyectos</a>
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
                            <h3 class="card-title mb-2">Tabla de Proyectos</h3>
                             <a href="{{ route('landing.projects-create') }}" class="btn btn-primary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; Añadir Proyecto</a>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre</th>
                                            <th>Fecha de inicio</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        @foreach ($projects as $item)
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                   <a href="{{ route('landing.projects-edit', $item->id) }}" class="btn btn-sm btn-primary mb-1"><i class="feather icon-edit"></i>Editar</a>
                                                   <form action="{{ route('landing.projects-delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                   <button type="submit" class="btn btn-sm btn-danger"><i class="feather icon-trash"></i>Eliminar</button>
                                                </form>
                                            </td>
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
