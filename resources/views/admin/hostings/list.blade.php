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
        $("#date_end").val($hosting.years);
        $("#price").val($hosting.price);
        $("#renewal_price").val($hosting.renewal_price);
        $("#cpanel_url").val($hosting.cpanel_url);
        $("#cpanel_email").val($hosting.cpanel_email);
        $("#cpanel_password").val($hosting.cpanel_password);
    }
</script>
@endpush
@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
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
                                        <tr class="text-center">
                                            <th>DOMINIO</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>CLIENTE</th>
                                            <th>F. VENCIMIENTO</th>
                                            <th>PRECIO</th>
                                            <th>PRECIO DE RENOVACION</th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($hostings as $hosting)
                                        <tr>
                                            <th scope="row">{{ $hosting->url }}</th>
                                            <td>{{ date('d/m/Y', strtotime($hosting->create_date)) }}</td>
                                            <td>
                                                {{$hosting->user->name}} {{$hosting->user->last_name}}
                                            </td>
                                            <td>
                                                {{ date('d/m/Y', strtotime($hosting->due_date)) }}
                                            </td>
                                            <td>
                                                @if (!is_null($hosting->price))
                                                ${{$hosting->price}}
                                                @else
                                                Dato no disponible
                                                @endif
                                            </td>
                                            <td>
                                                @if (!is_null($hosting->renewal_price))
                                                ${{$hosting->renewal_price}}
                                                @else
                                                Dato no disponible
                                                @endif
                                            </td>
                                            <td>
                                               @if ($hosting->status == 0)
                                                    <label class="label status-label status-label-purple">Activo</label>
                                               @elseif ($hosting->status == 1)
                                                    <label class="label status-label status-label-gray">Inactivo</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.hostings.show', [$hosting->id])}}" class=""><i class="fa fa-eye mr-1 action-icon"></i></a>

                                                <a href="#edit" data-toggle="modal" onclick="edithosting({{$hosting}});"><i class="fa fa-edit action-icon"></i></a>
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
                                    <div class="col-md-6 col-sm-12">
                                        <label for="hosting_url"><strong>Dominio</strong></label>
                                        <input name="hosting_url" id="hosting_url" class="form-control @error('hosting_url') is-invalid @enderror">
                                        @error('hosting_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="date"><strong>Fecha</strong></label>
                                        <input type="date" name="date" id="date" class="form-control  @error('date') is-invalid @enderror">
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="client"><strong>Cliente</strong></label>
                                        <select name="client" id="client" class="form-control @error('client') is-invalid @enderror">
                                            <option value="" selected disabled>Seleccione un cliente...</option>
                                            @foreach ($client as $item)
                                            <option value="{{ $item->id }}">{{ $item->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('client')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="date_end">Cantidad de años</label>
                                            <select name="date_end" id="date_end" class="form-control @error('date_end') is-invalid @enderror" required>
                                                <option value="" selected disabled>Seleccione los años para el hosting...</option>
                                                <option value="1" id="date_end">1 Año</option>
                                                <option value="2" id="date_end">2 Años</option>
                                                <option value="3" id="date_end">3 Años</option>
                                            </select>
                                            @error('date_end')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="price"><strong>Precio</strong></label>
                                        <input name="price" id="price" class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="renewal_price"><strong>Precio de Renovacion</strong></label>
                                        <input name="renewal_price" id="renewal_price" class="form-control @error('renewal_price') is-invalid @enderror">
                                        @error('renewal_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                                <input type="hidden" name="cpanel_url" id="cpanel_url" class="form-control">
                                <input type="hidden" name="cpanel_email" id="cpanel_email" class="form-control">
                                <input type="hidden" name="cpanel_password" id="cpanel_password" class="form-control">
                        </div>

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
