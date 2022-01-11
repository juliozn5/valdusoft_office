@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('custom_css')
<style>
    .btn-primary {
        border-color: #003573 !important;
        background-color: #003573 !important;
        color: #FFFFFF;
    }

    .btn-client {
        border-color: #8f138f !important;
        background-color: #650865 !important;
        color: #FFFFFF;
    }
    .btn-client:hover{
        color: #FFFFFF !important;
    }

    @import url('https://fonts.googleapis.com/css?family=Poppins');

    * {
        font-family: 'Poppins', sans-serif;
    }

    #chart {
        max-width: auto;
        /*margin: 35px auto;*/
        opacity: 0.9;
    }

    #timeline-chart .apexcharts-toolbar {
        opacity: 1;
        border: 0;
    }

    /*BOTON FAVORITO*/
    #form {
    width: 250px;
    margin: 0 auto;
    height: 50px;
    }

    #form p {
    text-align: center !important;
    }

    #form p label {
    font-size:2em;
    }

    input[type="radio"] {
    display: none;
    }

    p label {
    color: grey;
    font-size:2em;
    }

    .clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
    }

    p label:hover,
    p label:hover ~ label {
    color: orange;
    }
    /*
    input[type="radio"]:checked ~ label {
    color: orange;
    }
    */
    .active-favorite{
        color: orange;
    }
</style>
@endpush

@include('admin.partials.graficaCxG')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-12 col-sm-5">

                        {{-- Consulta todos los clientes --}}
                        <div class="card">
                            <div class="card-content p-1">
                                <div class="card-body">
                                    <img src="{{ asset('images/svg/ilustracion_clientes.svg') }}" class="float-right pl-2" width="150" height="150" alt="">
                                    <h4 class="pt-2">Consulta todos los clientes</h4>
                                    <a href="{{ route('admin.clients.list') }}" class="btn btn-client mt-1"><b>Ver clientes</b></a>
                                </div>
                            </div>
                        </div>

                        {{-- Consulta y paga la nomina --}}
                        <div class="card">
                            <div class="card-content p-1">
                                <div class="card-body">
                                    <img src="{{ asset('images/svg/ilustracion_nomina.svg') }}" class="float-right pl-2" width="150" height="150" alt="">
                                    <h4 class="pt-2">Consulta y paga la nomina</h4>
                                    <a href="{{ route('admin.payrolls.list') }}" class="btn btn-primary mt-1"><b>Ver nómina</b></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Tabla "Empleados" --}}
                    <div class="col-12 col-sm-7">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Empleados</h3>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive pt-2">
                                    <table class="table myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Telefono</th>
                                                <th>Favorito</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $item)
                                            <tr>
                                                <td>
                                                    @if (!is_null($item->photo))
                                                    <img class="rounded-circle" width="32px" height="32px" style="object-fit: cover;"   src="{{ asset('/storage/uploads/images/users/photos/'.$item->photo) }}" />
                                                    @else
                                                    <img class="rounded-circle" width="32px" height="32px" style="object-fit: cover;" src="{{ asset('images/valdusoft/valdusoft.png') }}" />
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('admin.employees.show', [$item->slug, $item->id]) }}">{{ $item->name }} {{ $item->last_name }}</a></td>
                                                <td><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                                                <td><a href="https://api.whatsapp.com/send?phone={{ $item->phone }}" Target="_blank">{{ $item->phone }}</a></td>
                                                <td>
                                                    <form id="#form">
                                                        <p class="clasificacion text-center">
                                                          <input class="input-radio" label-target="label{{$item->id}}" id="radio{{$item->id}}" type="radio" name="estrellas" value="{{$item->id}}"><!--
                                                          --><label @if($item->favorite == 1) class="active-favorite" @endif id="label{{$item->id}}" for="radio{{$item->id}}">★</label>
                                                        </p>
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

                {{-- Sección "Costos vs Ganancias" --}}
                <div id="chart">
                    <div class="card p-1">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Costos vs Ganancias</h3>
                        </div>
                        <div class="card-content">
                            <div id="timeline-chart"></div>
                        </div>
                    </div>
                </div>

                {{-- Sección "Listado de Hosting" --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Listado de Hostings</h3>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive pt-2">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>AVATAR</th>
                                                <th>CLIENTE</th>
                                                <th>URL</th>
                                                <th>FECHA DE CREACIÓN</th>
                                                <th>FECHA DE VENCIMIENTO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hostings as $hosting)
                                                <tr>
                                                    <td>
                                                        @if (isset($hosting->user->logo))
                                                        <img class="rounded-circle" style="object-fit: cover;" width="70px" height="70px" src="{{ asset('storage/'.$hosting->user->logo) }}" />
                                                        @else
                                                        <img class="rorounded-circle" style="object-fit: cover;" width="70px" height="70px" src="{{ asset('images/valdusoft/valdusoft.png') }}" />
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$hosting->user->name}} {{$hosting->user->last_name}}
                                                    </td>
                                                    <th scope="row">{{ $hosting->url }}</th>
                                                    <td>{{ date('d/m/Y', strtotime($hosting->create_date)) }}</td>
                                                    <td>{{date('d/m/Y', $hosting->renewal_hosting)}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('.input-radio').click(function(e){
            
            let labelTarget = $(this).attr('label-target')
        
            axios.post("{{route('ajaxFavorite')}}", {id: $(this).val()}).then( function(response){
                if(response.data.success == true){
                    $('#'+labelTarget).addClass('active-favorite')
                }else{
                    $('#'+labelTarget).removeClass('active-favorite');
                }
            }).catch(e => console.log(e))

        });

        $('.myTable').DataTable({
            responsive: true,
            order: [
                [0, "desc"]
            ],
            pageLength : 5,
            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
        })
    </script>
@endpush

@endsection
