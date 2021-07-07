@extends('layouts.app')

@section('content')
@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush
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
        toastr.success('El cliente ha sido eliminado con éxito.', 'Operación Completada');
    });
</script>
@endif
@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">


        <div class="content-body">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Clientes</h3>
                            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i>&nbsp; Añadir Cliente</a>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-gris">
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($client as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                @if (!is_null($item->photo))
                                                <img class="rounded-circle" width="50px" height="50px" src="{{ asset('storage/photo-profile/'.$item->photo) }}" />
                                                @else
                                                <img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft/valdusoft.png') }}" />
                                                @endif
                                            </td>
                                            
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                <a href="{{ route('admin.clients.show', [$item->slug,$item->id]) }}"><i class="fa fa-eye mr-1 action-icon"></i></a>
                                                <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fa fa-trash action-icon"></i></a>
                                                <form action="{{ route('admin.clients.delete', $item->id) }}" method="POST" id="delete-form">
                                                    @csrf
                                                    @method('DELETE')
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