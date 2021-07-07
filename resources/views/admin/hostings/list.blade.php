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
    $("#date_end").val($hosting.years);
    $("#price").val($hosting.price);
    $("#renewal_price").val($hosting.renewal_price);
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
                                            <td>${{$hosting->price}}</td>
                                            <td>${{$hosting->renewal_price}}</td>
                                            <td>
                                                <a href="{{route('admin.hostings.show', [$hosting->id])}}" class="mr-2" ><i class="fa fa-eye mr-1 action-icon"></i></a>
                                                
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
                                    <div class="col-6 ">
                                        <div class="form-group">
                                            <label for="date_end">Cantidad de años</label>
                                            <select name="date_end" id="date_end" class="form-control" required>
                                            <option value="" selected disabled>Seleccione los años para el hosting...</option>
                                                <option value="1" id="date_end">1 Año</option>
                                                <option value="2" id="date_end">2 Años</option>
                                                <option value="3" id="date_end">3 Anos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="price"><strong>Precio</strong></label>
                                        <input name="price" id="price" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="renewal_price"><strong>Precio de Renovacion</strong></label>
                                        <input name="renewal_price" id="renewal_price" class="form-control">
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