@extends('layouts.app')

@push('body-atribute')
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

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
                            <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                                Clientes</div>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                                class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.clients.list') }}">Clientes</a>
                                    </li>
                                    <li class="breadcrumb-item">Detalle del Cliente</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header mb-3">
                        <div class="row" id="all-center-items">
                            <div class="col-md-4">
                                @if (isset($client->photo))
                                    <img class="rounded-circle" style="object-fit:cover;"
                                        src="{{ asset('storage/' . $client->photo) }}" alt="" width="55px" height="55px">
                                @else
                                    <img class="rounded-circle" style="object-fit:cover;"
                                        src="{{ asset('images/valdusoft/valdusoft.png') }}" height="100" width="100">
                                @endif
                            </div>
                        </div>
                        <div class="col ml-1">
                            <h3 class="card-title mb-1">{{ $client->name }}</h3>
                            {{ $client->phone }} / {{ $client->email }}
                        </div>
                    </div>
                    <div class="ml-1 mb-3 mt-1">
                        <h5>Proyectos asignados</h5>
                    </div>
                    <div>
                        <div class="card">
                            <div class="row ">
                                @foreach ($projects as $item)
                                    <div class="container col-md-2 col-sm-1 mb-2 rounded">
                                        <img src="{{ asset('uploads/images/projects/' . $item->logo) }}"
                                            class="mt-2" alt="" style="width:100%;">
                                        <div class="pr-1 mt-2 h4 pb-2 text-center text-white" id="shadow">
                                            <div style="position: relative;top: 14px;"> {{ $item->name }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mr-3">
                                {{ $projects->links() }}
                            </div>

                            <div class="card-header">
                                <h3 class="card-title mb-2">Hosting y Dominios</h3>
                                <div class="container pb-2">
                                    <div class="row">
                                        @foreach ($hosting as $item)
                                            <div class="text-small col-md-6 col-sm-1 mb-1">
                                                <div class="card-body rounded p-1" style="background: #252856;">
                                                    <img class="float-right capa-left"
                                                        src="{{ asset('images/icons/background.png') }}" alt="">
                                                    <div class="row">
                                                        <div class="col-md-8 col-sm-12">
                                                            <p class="card-text h6 text-white mb-1">Fecha de Vencimiento</p>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-4 col-sm-12 text-a text-center">
                                                            <p class="card-text h6 text-white">{{ $item->url }}</p>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p class="h4 text-white"><i
                                                            class="fa fa-calendar icon-big mr-1"></i>{{ date('d/m/Y', strtotime($item->due_date)) }}
                                                    </p>
                                                    <a type="button" class="btn margen-b"
                                                        style="background-color:#FF4D00;color: white;" id="btn-guardar"><img
                                                            src="{{ asset('images/valdusoft/admin.png') }}" alt=""
                                                            class="mr-1">Ir al Cpanel</a>
                                                    <a type="button" class="btn margen-green"
                                                        style="background-color: #06B054;color: white;" data-toggle="modal"
                                                        data-target="#modalRenovar" id="btn-guardar"><img
                                                            src="{{ asset('images/valdusoft/refresh.png') }}" alt=""
                                                            class="mr-1"> Renovar</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h3 class="card-title mb-2 pl-2 pt-2">Facturas</h3>
                                    <div class="table-responsive ">
                                        <table class="table">
                                            <thead class="thead-light ">
                                                <th class="col-1">#</th>
                                                <th class="col-3">FECHA</th>
                                                <th class="col-2">MONTO</th>
                                                <th class="col-2">ESTADO</th>
                                                <th class="col-2">ACCION</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($client_bill as $client)
                                                    <tr>
                                                        <th scope="row">#{{ $client->id }}</th>
                                                        <td>{{ $client->date }}</td>
                                                        <td>{{ $client->amount }}$</td>
                                                        <td>
                                                            @if ($client->status == 0)
                                                                <label class="label status-label status-label-purple">No
                                                                    Atendido</label>
                                                            @elseif ($client->status == 1)
                                                                <label class="label status-label status-label-gray">En
                                                                    Proceso</label>
                                                            @elseif ($client->status == 2)
                                                                <label
                                                                    class="label status-label status-label-blue">Testiando</label>
                                                            @elseif ($client->status == 3)
                                                                <label
                                                                    class="label status-label status-label-green">Completado</label>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="#"><i class="fa fa-eye mr-1 action-icon"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mr-3">
                                        {{ $client_bill->links() }}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h3 class="card-title mb-2 pl-2 pt-2">Facturas</h3>
                                <div class="table-responsive ">
                                    <table class="table">
                                        <thead class="thead-light ">
                                            <th class="col-1">#</th>
                                            <th class="col-3">FECHA</th>
                                            <th class="col-2">MONTO</th>
                                            <th class="col-2">ESTADO</th>
                                            <th class="col-2">ACCION</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($client_bill as $client)
                                            <tr>
                                                <th scope="row">#{{ $client->id }}</th>
                                                <td>{{ $client->date }}</td>
                                                <td>{{ $client->amount }}$</td>
                                                <td>
                                                    @if ($client->status == 0)
                                                    <label class="label status-label status-label-purple">No Atendido</label>
                                                    @elseif ($client->status == 1)
                                                    <label class="label status-label status-label-gray">En Proceso</label>
                                                    @elseif ($client->status == 2)
                                                    <label class="label status-label status-label-blue">Testiando</label>
                                                    @elseif ($client->status == 3)
                                                    <label class="label status-label status-label-green">Completado</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#"><i class="fa fa-eye mr-1 action-icon"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mr-3">
                                    {{$client_bill->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalRenovar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Renovación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Seleccione el método de retiro</h4>
                    <div class="d-flex justify-content-center p-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="billetera" onchange="javascript:showContent()">
                            <label class="form-check-label" for="inlineRadio1">Billetera</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="bancolombia" onchange="javascript:showContent2()">
                            <label class="form-check-label" for="inlineRadio2">Bancolombia</label>
                        </div>
                    </div>

                    <form class="form form-vertical" action="{{ route('admin.clients.update', $client) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @include('admin.clients.partials.bancolombia')
                        @include('admin.clients.partials.billetera')
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .image-wrapper{
        position: relative;
        padding-bottom: 56.25%;            
    }

    .image-wrapper img{
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>

@push('custom_js')
<script>
    function previewFile(input, preview_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#" + preview_id).attr('src', e.target.result);
                $("#" + preview_id).css('height', '100px');
                $("#" + preview_id).parent().parent().removeClass('d-none');
            }
            $("label[for='" + $(input).attr('id') + "']").text(input.files[0].name);
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewPersistedFile(url, preview_id) {
        $("#" + preview_id).attr('src', url);
        $("#" + preview_id).css('height', '100px');
        $("#" + preview_id).parent().parent().removeClass('d-none');

    }

    function showContent() {
        element = document.getElementById("bancolombia");
        element2 = document.getElementById("billetera");
        check = document.getElementById("inlineRadio1");
        if (check.checked) {
            element.style.display='block';
            element2.style.display='none';
        }
        else {
            element.style.display='none';
            element2.style.display='block';
        }
    }

    function showContent2() {
        element = document.getElementById("billetera");
        element2 = document.getElementById("bancolombia");
        check = document.getElementById("inlineRadio2");
        if (check.checked) {
            element.style.display='block';
            element2.style.display='none';
        }
        else {
            element.style.display='none';
            element2.style.display='block';
        }
    }


</script>
@endpush
