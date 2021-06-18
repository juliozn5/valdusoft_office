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
                        <h2 class="content-header-title float-left mb-0">Project</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.projects.list') }}">Project</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.projects.edit', $projects->id) }}">Editar Project</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row d-flex justify-content-center mt-5 pb-3">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editando el Project de <span class="text-primary font-weight-bold">{{ $projects->client }}</span></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin.projects.update', $projects->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="client">Cliente</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="client"
                                                        value="{{ $projects->name }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="create_date">Fecha de Creacion</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="date" class="form-control" name="create_date"
                                                        value="{{ $projects->start_date }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="h5" for="create_date">Fecha de Inicio</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="date" class="form-control" name="create_date"
                                                        placeholder="Fecha de Inicio">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="h5" for="due_date">Fecha de Expiración</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="date" class="form-control" name="due_date"
                                                            placeholder="{{ $projects->status }}">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Editar</button>
                                            <a href="{{ route('admin.projects.list') }}"
                                                class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
