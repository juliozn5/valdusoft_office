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
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="content-body">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-gris">
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>FECHA DE ENTREGA</th>
                                            <th>ESTADO</th>
                                            <th>ACCIÒN</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>125966548</td>
                                            <td>Lorem ipsum dolor</td>
                                            <td>01/01/2021</td>
                                            <td>01/04/2021</td>
                                            <td><a href="#" class="genric-btn est rad">En proceso</a></td>
                                            <td>ACCION</td>
                                            <td>
                                        <tr>
                                        @foreach ($projects as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
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
