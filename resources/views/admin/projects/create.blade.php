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
                        <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                            Proyectos</div>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.projects.list') }}">Proyectos</a></li>
                                <li class="breadcrumb-item">Nuevo Proyecto</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="row" id="table-head">
                <form class="form" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Nuevo Proyecto</h3>
                            </div>
                            <div class="card-body pl-3 pr-3">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" id="name" class="form-control" autofocus required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="logo" id="logo">
                                                <label class="custom-file-label" for="logo">Seleccione un logo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="user_id">Cliente</label>
                                            <select name="user_id" id="user_id" class="form-control" required>
                                                <option value="" selected disabled>Seleccione un cliente...</option>
                                                @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }} {{ $client->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Descripción</label>
                                            <input type="text" class="form-control" name="description" id="description">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="link">Link de Visita</label>
                                            <input type="url" class="form-control" name="link" id="link">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="visible_landing">Visibilidad en LandingPage</label>
                                            <select class="form-control" name="visible_landing" id="visible_landing">
                                                <option value="1">Visible</option>
                                                <option value="0">No Visible</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="country_id">País</label>
                                            <select name="country_id" id="country_id" class="form-control" required>
                                                <option value="" selected disabled>Seleccione un país...</option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="type">Tipo</label>
                                            <select name="type" id="type" class="form-control" required>
                                                <option value="" selected disabled>Seleccione un tipo...</option>
                                                <option value="Fijo">Fijo</option>
                                                <option value="Entrega">Entrega</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="status">Estado</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="" selected disabled>Seleccione un estado...</option>
                                                <option value="0">No Atendido</option>
                                                <option value="1">En Proceso</option>
                                                <option value="2">Testiando</option>
                                                <option value="3">Completado</option>
                                                <option value="4">Eliminado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="start_date">Fecha de inicio</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="ending_date">Fecha de entrega</label>
                                            <input type="date" name="ending_date" id="ending_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="amount">Monto</label>
                                            <input type="number" name="amount" id="amount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="pb-1"><label for="tags">Etiquetas</label></div>
                                            <div class="row ml-1">
                                                @foreach ($tags as $tag)
                                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                                                    <input type="checkbox" class="form-check-input skills" value="{{ $tag->id }}" name="tags[]">
                                                    <label class="form-check-label">{{ $tag->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="pb-1"><label for="technologies">Tecnologías</label></div>
                                            <div class="row ml-1">
                                                @foreach ($technologies as $technology)
                                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                                                    <input type="checkbox" class="form-check-input skills" value="{{ $technology->id }}" name="technologies[]">
                                                    <label class="form-check-label">{{ $technology->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 alert alert-danger" id="errors_div" style="display: none;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light" id="btn-guardar">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection