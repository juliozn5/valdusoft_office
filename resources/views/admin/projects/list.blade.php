@extends('layouts.app')

@section('content')
@if (Session::has('msj-exitoso'))
<script>
    $(document).ready(function() {
        toastr.success('El proyecto ha sido creado con éxito.', 'Operación Completada');
    });
</script>
@endif
@if (Session::has('msj-deleted'))
<script>
    $(document).ready(function() {
        toastr.success('El proyecto ha sido eliminado con éxito.', 'Operación Completada');
    });
</script>
@endif
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-body">

            <div id="table-head">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-1">Proyectos</h3>
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-2 waves-effect waves-light"> Agregar nuevo proyecto</a>
                        </div>

                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr class="">
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>FECHA DE ENTREGA</th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                        <tr>
                                            <th scope="row">{{ $project->id }}</th>
                                            <td>{{ $project->name }}</td>
                                            <td>
                                                {{ (is_null($project->start_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($project->start_date)) }}
                                            </td>
                                            <td>
                                                {{ (is_null($project->ending_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($project->ending_date)) }}
                                            </td>
                                            <td>
                                                @if ($project->status == 0)
                                                <label class="label status-label status-label-purple">No Atendido</label>
                                                @elseif ($project->status == 1)
                                                <label class="label status-label status-label-gray">En Proceso</label>
                                                @elseif ($project->status == 2)
                                                <label class="label status-label status-label-blue">Testiando</label>
                                                @elseif ($project->status == 3)
                                                <label class="label status-label status-label-green">Completado</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.projects.show', [$project->slug, $project->id]) }}"><i class="fa fa-eye mr-1 action-icon"></i></a>
                                                <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fa fa-trash action-icon"></i></a>
                                                <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" id="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mr-3">
                                {{ $projects->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection