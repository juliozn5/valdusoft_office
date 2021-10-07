@extends('layouts.app')

@push('scripts')
<script>
    $(document).ready(function() {
        
        $('.delete-attachment').on('click', function() {
            var id = $(this).attr('data-id').split("-");
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esta acción",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡Borrar!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                cancelButtonText: 'Cancelar',
                buttonsStyling: false,
            }).then(function(result) {
                if (result.value) {
                    document.getElementById('delete-attachment-' + id[1]).submit();
                }
            })
        });
    });

    function editAttachment($attachment) {
        $("#attachment_id").val($attachment.id);
        $("#name").val($attachment.name);
        $("#file_type option[value=" + $attachment.file_type + "]").attr("selected", true);
    }

    function editProject($project) {
        $("#project_name").val($project.name);
        $("#project_user_id option[value=" + $project.user_id + "]").attr("selected", true);
        $("#project_country_id option[value=" + $project.country_id + "]").attr("selected", true);
        $("#project_type option[value=" + $project.type + "]").attr("selected", true);
        $("#project_start_date").val($project.start_date);
        $("#project_ending_date").val($project.ending_date);
        $("#project_status option[value=" + $project.status + "]").attr("selected", true);
    }

    function editAttachment($attachment) {
        $("#attachment_id").val($attachment.id);
        $("#name").val($attachment.name);
        $("#file_type option[value=" + $attachment.file_type + "]").attr("selected", true);
    }

    function changeTransactionType($type) {
        $("#type option[value=" + $type + "]").attr("selected", true);
        if ($type == '+') {
            $("#transaction_type_button").html('Ingreso');
        } else {
            $("#transaction_type_button").html('Egreso');
        }
    }

    function addTransaction() {
        if ($("#amount").val() == "") {
            Swal.fire({
                title: "¡Ups!",
                text: "¡Debes especificar un monto primero!",
                type: "error",
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
        } else {
            $("#amount-hidden").val($("#amount").val());
            $("#newTransaction").modal("show");
        }
    }

    function editTransaction($transaction) {
        $("#transaction_id").val($transaction.id);
        $("#description").val($transaction.description);
        $("#status option[value=" + $transaction.status + "]").attr("selected", true);
    }
</script>
@endpush

@push('body-atribute')
class="vertical-layout vertical-menu-modern content-left-sidebar chat-application navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')
@if (Session::has('msj-exitoso'))
<script>
    $(document).ready(function() {
        toastr.success('La asignación se ha realizado con éxito.', 'Operación Completada');
    });
</script>
@endif

@if (Session::has('msj-attachment'))
<script>
    $(document).ready(function() {
        toastr.success('El archivo adjunto se ha agregado con éxito.', 'Operación Completada');
    });
</script>
@endif

@if (Session::has('attachment-deleted'))
<script>
    $(document).ready(function() {
        toastr.success('El archivo adjunto ha sido eliminado con éxito.', 'Operación Completada');
    });
</script>
@endif

@if (Session::has('attachment-deleted'))
<script>
    $(document).ready(function() {
        toastr.success('El archivo adjunto ha sido eliminado con éxito.', 'Operación Completada');
    });
</script>
@endif

@if (Session::has('msj-transaction'))
<script>
    $(document).ready(function() {
        toastr.success('La transacción contable se ha agregado con éxito.', 'Operación Completada');
    });
</script>
@endif

@if (Session::has('transaction-updated'))
<script>
    $(document).ready(function() {
        toastr.success('Los datos de la transacción contable se han modificado con éxito.', 'Operación Completada');
    });
</script>
@endif

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">Proyectos</div>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.projects.list') }}">Proyectos</a></li>
                                <li class="breadcrumb-item">Detalle del Proyecto</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="row" id="table-head">
                {{-- Sección Izquierda --}}
                <div class="col-6">
                    <div class="card">
                        <div style="height: 300px;">
                            @if (!is_null($project->logo))
                            <img src="{{ asset('uploads/images/projects/'.$project->logo) }}" width="100%" height="100%">
                            @else
                            <img src="{{ asset('images/logo.webp') }}" width="100%" height="100%">
                            @endif
                        </div>

                        <div class="p-2">
                            <div class="row">
                                <div class="col-6 text-left">
                                    <h3 class="card-title">{{ $project->name }}</h3>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-primary btn-sm waves-effect waves-light" href="#editProject" data-toggle="modal" onclick="editProject({{ $project }});"><i class="fa fa-edit"></i> Editar</a>
                                </div>
                            </div>

                            {{-- Sección de Cliente --}}
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="project-detail-titles">Cliente</div>
                                    <div class="mt-1 project-detail-dates">
                                        {{ $project->user->name }} {{ $project->user->last_name }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="project-detail-titles">País</div>
                                    <div class="mt-1 project-detail-dates">
                                       @if (!is_null($project->country_id)) {{ $project->country->name }} @else No Definido @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Sección de Miembros--}}
                            <div class="row mt-2">
                                <div class="col-12 pb-1">
                                    <div class="project-detail-titles">Miembros</div>
                                </div>
                                @foreach ($project->employees as $employee)
                                <div class="col-1 mr-1">
                                    <img class="rounded-circle" src="{{ asset('/uploads/images/users/photos/'.$employee->photo) }}" alt="{{ $employee->name }} {{ $employee->last_name }}" height="50" width="50">
                                </div>
                                @endforeach
                                <div class="col-1">
                                    <a href="#availableEmployees" data-toggle="modal">
                                        <img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Miembro" height="50" width="50">
                                    </a>
                                </div>
                            </div>

                            {{-- Sección de Fechas --}}
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="project-detail-titles">Fecha de Inicio</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i> {{ (is_null($project->start_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($project->start_date)) }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="project-detail-titles">Fecha de Entrega</div>
                                    <div class="mt-1 project-detail-dates">
                                        <i class="far fa-calendar icon-big mr-1"></i> {{ (is_null($project->ending_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($project->ending_date)) }}
                                    </div>
                                </div>
                            </div>

                            {{-- Sección de Tecnologías --}}
                            <div class="mt-2">
                                <div class="project-detail-titles">Tecnologías</div>
                                <div class="mt-1">
                                    @foreach ($project->technologies as $technology)
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-detail-skill">{{ $technology->name }}</div>
                                    </div>
                                    @endforeach
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <a href="#availableTechnologies" data-toggle="modal">
                                            <img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Tecnología" height="40" width="40">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- Sección de Status --}}
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="project-detail-titles">Estado</div>
                                    <div class="mt-1 project-detail-dates">
                                        @if ($project->status == 0)
                                        <label class="label status-label status-label-purple">No Atendido</label>
                                        @elseif ($project->status == 1)
                                        <label class="label status-label status-label-gray">En Proceso</label>
                                        @elseif ($project->status == 2)
                                        <label class="label status-label status-label-blue">Testiando</label>
                                        @elseif ($project->status == 3)
                                        <label class="label status-label status-label-green">Completado</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="project-detail-titles">Etiquetas</div>
                                    <div class="mt-1">
                                        @foreach ($project->tags as $tag)
                                            <div class="text-center text-white d-inline-block mr-1">
                                                <div class="project-detail-skill">{{ $tag->name }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sección Derecha --}}
                <div class="col-6">
                    <div class="card">
                        <div class="pt-2 pl-2 pr-2 pb-0">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link nav-link-pills  @if (!Session::has('msj-transaction')) active @endif" data-toggle="tab" href="#attachments">Adjuntos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-pills" data-toggle="tab" href="#chat">Chat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-pills  @if (Session::has('msj-transaction')) active @endif" data-toggle="tab" href="#accountant">Contable</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            {{-- Pestaña de Adjuntos --}}
                            <div class="tab-pane  @if (!Session::has('msj-transaction')) active @endif pl-2 pr-2 pt-1" id="attachments">
                                <h3 class="card-title">Adjuntos</h3>

                                <div class="row mt-1 mb-2">
                                    @if ($project->attachments->count() > 0)
                                    @foreach ($project->attachments as $attachment)
                                    <div class="col-4 pt-1">
                                        @if ($attachment->file_type == 'image')
                                        <a href="{{ asset('uploads/attachments/'.$attachment->file_name) }}" target="_blank">
                                            <img src="{{ asset('images/icons/files/image.png') }}" alt="{{ $attachment->name }}" width="80px" height="80px" alt="img">
                                        </a>
                                        @elseif($attachment->file_type == 'pdf')
                                        <a href="{{ asset('uploads/attachments/'.$attachment->file_name) }}" target="_blank">
                                            <img src="{{ asset('images/icons/files/pdf.png') }}" alt="{{ $attachment->name }}" width="80px" height="80px" alt="pdf">
                                        </a>
                                        @elseif($attachment->file_type == 'excel')
                                        <a href="{{ asset('uploads/attachments/'.$attachment->file_name) }}" target="_blank">
                                            <img src="{{ asset('images/icons/files/excel.png') }}" alt="{{ $attachment->name }}" width="80px" height="80px" alt="excel">
                                        </a>
                                        @elseif($attachment->file_type == 'ppt')
                                        <a href="{{ asset('uploads/attachments/'.$attachment->file_name) }}" target="_blank">
                                            <img src="{{ asset('images/icons/files/powerpoint.png') }}" alt="{{ $attachment->name }}" width="80px" height="80px" alt="ppt">
                                        </a>
                                        @endif
                                    </div>
                                    <div class="col-8 pt-1">
                                        <div style="font-size: 12px; font-weight: 500; color: #3C3232;">{{ $attachment->name }} - {{$attachment->file_type }}</div>

                                        <div class="mt-2" style="font-size: 12px; font-weight: 300; color: #9D9EAF;">
                                            Añadido: {{ $attachment->date }} a las {{ $attachment->time }}<br>
                                            <a href="javascript:;" class="delete-attachment" data-id="attachment-{{ $attachment->id }}">Eliminar</a> - <a href="#editAttachment" data-toggle="modal" onclick="editAttachment({{ $attachment }});">Editar</a>
                                        </div>
                                    </div>
                                    <form action="{{ route('admin.projects.delete-attachment', $attachment->id) }}" method="POST" id="delete-attachment-{{ $attachment->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endforeach
                                    @else
                                    <div class="col-12 p-2">
                                        No hay archivos adjuntos actualmente...
                                    </div>
                                    @endif
                                </div>

                                <div>
                                    <a href="#newAttachment" data-toggle="modal" class="btn btn-info mb-2 waves-effect waves-light"> Añadir un adjunto</a>
                                </div>
                            </div>

                            {{-- Pestaña del Chat --}}
                            <div class="tab-pane fade pl-2 pr-2" id="chat">
                                <h3 class="card-title">Chat</h3>

                                @livewire("chat-list", ['project' => $project->id])

                                @livewire("chat-form", ['project' => $project->id])
                            </div>

                            {{-- Pestaña de Contable --}}
                            <div class="tab-pane  @if (Session::has('msj-transaction')) active @else fade @endif" id="accountant">
                                <h3 class="card-title ml-2">Contable</h3>

                                <div class="table-responsive mt-1">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <tr class="">
                                                <th>FECHA</th>
                                                <th>DESCRIPCIÓN</th>
                                                <th>MONTO</th>
                                                <th>ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($project->accounting_transactions->count() > 0)
                                            @foreach ($project->accounting_transactions as $transaction)
                                            <tr>
                                                <td>{{ date('d-m-Y', strtotime($transaction->date)) }}</td>
                                                <td>
                                                    <span class="transaction-description">{{ $transaction->description }}</span><br>
                                                    @if ($transaction->status == 0)
                                                    <span class="transaction-status">Pendiente</span>
                                                    @elseif ($transaction->status == 1)
                                                    <span class="transaction-status">Completada</span>
                                                    @elseif ($transaction->status == 2)
                                                    <span class="transaction-status">Cancelada</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($transaction->type == '+')
                                                    <span class="text-success">
                                                        {{ $transaction->type }} {{ number_format($transaction->amount, 2, ',', '.') }}
                                                    </span>
                                                    @else
                                                    <span class="text-danger">
                                                        {{ $transaction->type }} {{ number_format($transaction->amount, 2, ',', '.') }}
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#editTransaction" data-toggle="modal" onclick="editTransaction({{ $transaction }});"><i class="fa fa-edit mr-1 action-icon"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="3">El proyecto no posee transacciones contables...</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div>
                                    <div class="row pl-2 pr-2 pt-1">
                                        <div class="col-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="amount" placeholder="0.00">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" id="transaction_type_button">
                                                        Egreso
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                        {{-- <a class="dropdown-item" href="javascript:;" onclick="changeTransactionType('+');">Ingreso</a> --}}
                                                        <a class="dropdown-item" href="javascript:;" onclick="changeTransactionType('-');">Egreso</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button class="btn btn-info mb-2 waves-effect waves-light" onclick="addTransaction();">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal para editar datos del proyecto --}}
<div class="modal fade text-left" id="editProject" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Editar Proyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="project_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="user_id">Cliente</label>
                                <select name="user_id" id="projet_user_id" class="form-control">
                                    <option value="" selected disabled>Seleccione un cliente...</option>
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }} {{ $client->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="country">País</label>
                                <select name="country_id" id="project_country_id" class="form-control">
                                    <option value="" selected disabled>Seleccione un país...</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="start_date">Fecha de inicio</label>
                                <input type="date" name="start_date" id="project_start_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="ending_date">Fecha de entrega</label>
                                <input type="date" name="ending_date" id="project_ending_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <select name="type" id="project_type" class="form-control">
                                    <option value="" selected disabled>Seleccione un tipo...</option>
                                    <option value="Fijo">Fijo</option>
                                    <option value="Entrega">Entrega</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="type">Estado</label>
                                <select name="status" id="project_status" class="form-control">
                                    <option value="0">No Atendido</option>
                                    <option value="1">En Proceso</option>
                                    <option value="2">Testiando</option>
                                    <option value="3">Completado</option>
                                    <option value="4">Eliminado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" id="logo">
                                    <label class="custom-file-label" for="logo">Seleccione un logo</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="pb-1"><label for="tags">Etiquetas</label></div>
                                <div class="row ml-1">
                                    @foreach ($tags as $tag)
                                        @php
                                            $check = 0;
                                            if (in_array($tag->id, $tagsID)){
                                                $check = 1;
                                            }
                                        @endphp
                                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                            <input type="checkbox" class="form-check-input skills" value="{{ $tag->id }}" name="tags[]" @if ($check == 1) checked @endif>
                                            <label class="form-check-label">{{ $tag->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal para agregar Miembros --}}
<div class="modal fade text-left" id="availableEmployees" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Miembros Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.projects.assign-members') }}" method="POST">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="modal-body">
                    <div class="row ml-2 mr-2">
                        @if ($availableEmployees->count() > 0)
                        @foreach ($availableEmployees as $availableEmployee)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                            <label class="form-check-label" for="employee-{{ $availableEmployee->id }}">
                                <input type="checkbox" class="form-check-input" id="employee-{{ $availableEmployee->id }}" value="{{ $availableEmployee->id }}" name="employees[]">
                                {{ $availableEmployee->name }} {{ $availableEmployee->last_name }}
                            </label>
                        </div>
                        @endforeach
                        @else
                        <div class="col-12">
                            No hay miembros disponibles para asignar...
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Asignar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal para agregar Tecnologías --}}
<div class="modal fade text-left" id="availableTechnologies" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Tecnologías Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.projects.assign-technologies') }}" method="POST">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="modal-body">
                    <div class="row ml-2 mr-2">
                        @if ($availableTechnologies->count() > 0)
                        @foreach ($availableTechnologies as $availableTechnology)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <label class="form-check-label" for="technology-{{ $availableTechnology->id }}">
                                <input type="checkbox" class="form-check-input" id="technology-{{ $availableTechnology->id }}" value="{{ $availableTechnology->id }}" name="technologies[]">
                                {{ $availableTechnology->name }}
                            </label>
                        </div>
                        @endforeach
                        @else
                        <div class="col-12">
                            No hay tecnologías disponibles para asignar...
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Asignar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal para agregar archivo adjunto --}}
<div class="modal fade text-left" id="newAttachment" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Añadir Archivo Adjunto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.projects.add-attachment') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nombre para el archivo</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="file_type">Tipo de Archivo</label>
                                <select name="file_type" class="form-control" required>
                                    <option value="" selected disabled>Seleccione una opción...</option>
                                    <option value="pdf">PDF</option>
                                    <option value="image">Imagen</option>
                                    <option value="excel">Excel</option>
                                    <option value="ppt">Presentación PowerPoint</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="file">Archivo adjunto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="file">
                                    <label class="custom-file-label" for="logo">Seleccione un archivo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal para editar archivo adjunto --}}
<div class="modal fade text-left" id="editAttachment" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel110">Editar Archivo Adjunto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.projects.update-attachment') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="attachment_id" id="attachment_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nombre para el archivo</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="file_type">Tipo de Archivo</label>
                                <select name="file_type" id="file_type" class="form-control">
                                    <option value="pdf">PDF</option>
                                    <option value="image">Imagen</option>
                                    <option value="excel">Excel</option>
                                    <option value="ppt">Presentación PowerPoint</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="file">Archivo adjunto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="file">
                                    <label class="custom-file-label" for="logo">Seleccione un archivo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal para agregar nueva transacción --}}
<div class="modal fade text-left" id="newTransaction" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Agregar Contable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.projects.add-accounting-transaction') }}" method="POST">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Descripción para la transacción</label>
                                <input type="text" name="description" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="amount">Monto</label>
                                <input type="text" name="amount" id="amount-hidden" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <select name="type" id="type" class="form-control" required>
                                    {{-- <option value="+" selected>Ingreso</option> --}}
                                    <option value="-">Egreso</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="status">Estado</label>
                                <select name="status" class="form-control" required>
                                    <option value="" selected disabled>Seleccione un estado...</option>
                                    <option value="0">Pendiente</option>
                                    <option value="1">Completado</option>
                                    <option value="2">Cancelado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal para editar una transacción --}}
<div class="modal fade text-left" id="editTransaction" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Editar Contable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin.projects.update-accounting-transaction') }}" method="POST">
                @csrf
                <input type="hidden" name="transaction_id" id="transaction_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Descripción para la transacción</label>
                                <input type="text" name="description" id="description" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="status">Estado</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="0">Pendiente</option>
                                    <option value="1">Completada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection