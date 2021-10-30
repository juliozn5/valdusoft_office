@extends('layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div id="table-head">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title mb-1">proyectos</h1>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr class="">
                                            <th>ID</th>
                                            <th class="text-center">NOMBRE</th>
                                            <th class="text-center">FECHA DE INICIO</th>
                                            <th class="text-center">FECHA DE ENTREGA</th>
                                            <th class="text-center" >ESTADO</th>
                                            <th class="text-center">ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                        <tr>
                                            <th scope="row">{{ $project->id }}</th>
                                            <td class="text-center">{{ $project->name }}</td>
                                            <td class="text-center" >
                                                {{ (is_null($project->start_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($project->start_date)) }}
                                            </td>
                                            <td class="text-center">
                                                {{ (is_null($project->ending_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($project->ending_date)) }}
                                            </td class="text-center">
                                            <td class="text-center">
                                                @if ($project->status == 0)
                                                <label class="label status-label status-label-purple">No Atendido</label>
                                                @elseif ($project->status == 1)
                                                <label class="label status-label status-label-gray">En Proceso</label>
                                                @elseif ($project->status == 2)
                                                <label class="label status-label status-label-blue">Testiando</label>
                                                @elseif ($project->status == 3)
                                                <label class="label status-label status-label-green">Completado</label>
                                                @elseif ($project->status == 4)
                                                <label class="label status-label status-label-red">Eliminado</label>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('employee.projects.show', [$project->slug, $project->id]) }}"><i class="fa fa-eye mr-1 action-icon"></i></a>
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

@push('custom_js')

<script>
$('.table').DataTable({
    responsive: true,
    order: [[ 0, "asc" ]],
})
</script>
@endpush
