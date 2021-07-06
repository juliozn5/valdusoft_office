@extends('layouts.app')

@section('content')
@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush
@push('scripts')
<script>

function edithosting($hosting) {

    $("#hosting_id").val($hosting.id);
    $("#hosting_url").val($hosting.url);
    $("#date").val($hosting.create_date);
    $("#client option[value=" + $hosting.user_id + "]").attr("selected", true);
    $("#date_end").val($hosting.due_date);
}

</script>
@endpush
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
                        <h2 class="content-header-title float-left mb-0">Hosting</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.hostings.list') }}">Hosting</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">

            <div id="table-head">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-1">Hosting</h3>
                            <a href="{{ route('admin.hostings.create') }}" class="btn btn-primary mb-2 waves-effect waves-light"> Agregar nuevo hosting</a>
                        </div>

                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr class="">
                                            <th>DOMINIO</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>CLIENTE</th>
                                            <th>FECHA DE VENCIMIENTO</th>
                                            <th>PRECIO</th>
                                            <th>PRECIO DE RENOVACION</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hostings as $hosting)
                                        <tr>
                                            <th scope="row">{{ $hosting->url }}</th>
                                            <td>{{ date('d/m/Y', strtotime($hosting->create_date)) }}</td>
                                            <td>
                                                {{$hosting->user->name}}
                                            </td>
                                            <td>
                                                {{ date('d/m/Y', strtotime($hosting->due_date))}}
                                            </td>
                                            <td>Null</td>
                                            <td>Null</td>
                                            <td>
                                                <a href="{{route('admin.hostings.detail')}}" class="mr-2" ><i class="fa fa-eye mr-1 action-icon"></i></a>
                                                
                                                 <a href="#edit" data-toggle="modal" onclick="edithosting({{$hosting}});"><img id="bottom"src="{{asset('images/icons/Group.png')}}" alt=""></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mr-3">
                                {{ $hostings->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <!--  MODAL EDITAR NOMINA  -->

        <div class="modal  fade text-left " id="edit" tabindex="-1" role="dialog" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title">Editar Nómina</h5>
                        <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="{{ route('admin.hostings.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="hosting_id" id="hosting_id" value="">
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="hosting_url"><strong>Dominio</strong></label>
                                        <input name="hosting_url" id="hosting_url" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="date"><strong>Fecha</strong></label>
                                        <input type="date" name="date" id="date" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="client"><strong>Cliente</strong></label>
                                        <select name="client" id="client" class="form-control">
                                            <option value="" selected disabled>Seleccione un cliente...</option>
                                            @foreach ($client as $item)
                                               <option value="{{ $item->id }}">{{ $item->name}} </option> 
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6"> 
                                        <label for="date_end"><strong>Fecha de vencimiento</strong></label>
                                        <input type="date" name="date_end" id="date_end" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <br><br>
                            
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection