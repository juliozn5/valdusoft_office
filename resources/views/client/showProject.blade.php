@extends('layouts.app')


@push('scripts')
<script>
    function editAttachment($attachment) {
        $("#attachment_id").val($attachment.id);
        $("#name").val($attachment.name);
        $("#file_type option[value=" + $attachment.file_type + "]").attr("selected", true);
    }
</script>
@endpush


@push('body-atribute')
class="vertical-layout vertical-menu-modern content-left-sidebar chat-application navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush



@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="content-header-left mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-8">
                        <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">Proyectos</div>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('client.projects.list') }}">Proyectos</a></li>
                                <li class="breadcrumb-item">Detalle del Proyecto</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-4 text-right pr-2">
                        <a href="{{route('client.projects.list')}}"><u>Atrás</u></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="row" id="table-head">

                <!-- Sección Izquierda -->
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div style="height: 300px;">
                            @if (!is_null($project->logo))
                            <img src="{{ asset('uploads/images/projects/'.$project->logo) }}" width="100%" height="100%">
                            @else
                            <img src="{{ asset('images/logo.webp') }}" width="100%">
                            @endif
                        </div>

                        <div class="p-2">
                            <h3 class="text-primary font-weight-bolder text-uppercase">{{ $project->name }}</h3>

                            <!-- Sección de Miembros-->
                            <div class="row mt-2">
                                <div class="col-12 pb-1">
                                    <div class="project-detail-titles">Miembros</div>
                                </div>
                                @foreach ($project->employees as $employee)
                                <div class="col-1 mr-1">
                                    <img class="rounded-circle" style="object-fit: cover;" src="{{asset('storage/photo-profile/'.$employee->photo)}}" alt=" {{$employee->name .' '. $employee->last_name}}" title=" {{$employee->name .' '. $employee->last_name}}" height="50" width="50">
                                </div>
                                @endforeach
                            </div>

                            <!-- Sección de Fechas -->
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

                            <!-- Sección de Tecnologías -->
                            <div class="mt-2">
                                <div class="project-detail-titles">Tecnologías</div>
                                <div class="mt-1">
                                    @foreach ($project->technologies as $tech)
                                    <div class="text-center text-white d-inline-block mr-1">
                                        <div class="project-detail-skill">{{$tech->name}}</div>
                                    </div>
                                    @endforeach

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
                                        <div class="text-center text-white d-inline-block mr-1 pb-1">
                                            <div class="project-detail-skill">{{ $tag->name }}</div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Sección Derecha -->
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="pt-2 pl-2 pr-2 pb-0">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link nav-link-pills active" data-toggle="tab" href="#attachments">Adjuntos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-pills" data-toggle="tab" href="#chat">Chat</a>
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
                                            <a href="#editAttachment" data-toggle="modal" onclick="editAttachment({{ $attachment }});">Editar</a>
                                        </div>
                                    </div>

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
                        </div>
                    </div>
                </div>
            </div>
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
            <form action="{{ route('client.project.add-attachments') }}" method="POST" enctype="multipart/form-data">
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
            <form action="{{ route('client.projects.update-attachments') }}" method="POST" enctype="multipart/form-data">
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
@endsection