@extends('layouts.app')

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.delete-attachment').on('click', function () {
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
                }).then(function (result) {
                    if (result.value) {
                        document.getElementById('delete-attachment-'+id[1]).submit();
                    }
                })
            });
        });

        function editAttachment($attachment){
            $("#attachment_id").val($attachment.id);
            $("#name").val($attachment.name);
            $("#file_type option[value="+$attachment.file_type+"]").attr("selected", true);
        }
    </script>
@endpush

@section('content')
    @if (Session::has('msj-exitoso'))
        <script>
            $(document).ready(function(){
                toastr.success('La asignación se ha realizado con éxito.', 'Operación Completada');
            });
        </script>
    @endif

    @if (Session::has('msj-attachment'))
        <script>
            $(document).ready(function(){
                toastr.success('El archivo adjunto se ha agregado con éxito.', 'Operación Completada');
            });
        </script>
    @endif

    @if (Session::has('attachment-deleted'))
        <script>
            $(document).ready(function(){
                toastr.success('El archivo adjunto ha sido eliminado con éxito.', 'Operación Completada');
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
                                <img src="{{ asset('uploads/images/projects/'.$project->logo) }}" width="100%" height="100%">
                            </div>

                            <div class="p-2">
                                <h3 class="card-title">{{ $project->name }}</h3>
                                
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
                                            {{ $project->country->name }}
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
                                    <div class="col-12">
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
                                        <a class="nav-link nav-link-pills active" data-toggle="tab" href="#attachments">Adjuntos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link nav-link-pills" data-toggle="tab" href="#chat">Chat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link nav-link-pills" data-toggle="tab" href="#accountant">Contable</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="tab-content">
                                {{-- Pestaña de Adjuntos --}}
                                <div class="tab-pane active pl-2 pr-2 pt-1" id="attachments">
                                    <h3 class="card-title">Adjuntos</h3>

                                    <div class="row mt-1 mb-2">
                                        @if ($project->attachments->count() > 0)
                                            @foreach ($project->attachments as $attachment)
                                                <div class="col-4 pt-1">
                                                    @if ($attachment->file_type == 'image')
                                                        <a href="{{ asset('uploads/attachments/'.$attachment->file_name) }}" target="_blank">
                                                            <img src="{{ asset('uploads/attachments/'.$attachment->file_name) }}" alt="{{ $attachment->name }}" width="100%" height="200px">
                                                        </a>
                                                    @else
                                                        <a href="{{ asset('uploads/attachments/'.$attachment->file_name) }}" target="_blank">
                                                            <img src="{{ asset('images/pdf.png') }}" alt="{{ $attachment->name }}" width="100%">
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="col-8 pt-1">
                                                    <div style="font-size: 12px; font-weight: 500; color: #3C3232;">{{ $attachment->name }}</div>

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
                                </div>

                                {{-- Pestaña de Contable --}}
                                <div class="tab-pane fade" id="accountant">
                                    <h3 class="card-title ml-2">Contable</h3>

                                    <div class="table-responsive mt-1">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr class="">
                                                    <th>FECHA</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>MONTO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>05 May 2021</td>
                                                    <td>Pago de ejemplo<br> Completado</td>
                                                    <td>400,03</td>
                                                </tr>
                                                <tr>
                                                    <td>05 May 2021</td>
                                                    <td>Pago de ejemplo<br> Completado</td>
                                                    <td>-300,14</td>
                                                </tr>
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
                                            {{ $availableEmployee->name }}
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
                                    <input type="file" name="file" class="form-control" required>
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
                                    <input type="file" name="file" id="file" class="form-control">
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
