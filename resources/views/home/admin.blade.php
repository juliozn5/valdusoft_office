@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('custom_css')
<style>

.btn-client{
    border-color: #8f138f !important;
    background-color: #650865 !important;
    color: #FFFFFF;
}

.btn-payroll{
    border-color: #0151ae !important;
    background-color: #003573 !important;
    color: #FFFFFF;
}


</style>
@endpush

@push('custom_js')
<script>
    var options = {
    chart: {
      type: 'bar'
    },
    
    series: [{
      name: 'sales',
      data: [30,40,45,50,49,60,70,91,125]
    }],
  
    xaxis: {
      categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
    }
  }
  
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  
  chart.render();
  
</script>

@endpush

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

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

                    <div class="col-4">

                        <div class="card">
                            <div class="card-content pl-1">
                                <div class="card-body">
                                <img src="{{ asset('images/ilustracion clientes.svg') }}" class="float-right pl-2" width="110" height="110" alt="">
                                    <h6>Consulta todos los clientes</h6>
                                </div>
                                <a href="{{ route('landing.customers') }}" class="btn btn-primary btn-client"><b>Ver clientes</b></a>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-content pl-1">
                                <div class="card-body">
                                <img src="{{ asset('images/ilustracion nomina.svg') }}" class="float-right pl-2" width="110" height="110" alt="">
                                    <h6>Consulta y paga la nomina</h6>
                                </div>
                                <a href="{{ route('landing.payroll') }}" class="btn btn-primary btn-payroll"><b>Ver nomina</b></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Tabla de empleados</h3>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Foto</th>
                                                <th>Nombre</th>
                                                <th>Cargo</th>
                                                <th>Email</th>
                                                <th>Telefono</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $item)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                @if(!$item->getMedia('photo')->isEmpty())
                                                <th><img class="rounded-circle" width="50px" height="50px" src="{{ $item->photoUrl }}" /></th>
                                                @else
                                                <th><img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft.png') }}" /></th>
                                                @endif
                                                <td>{{ $item->name }}</td>
                                                @if($item->position === '0')
                                                <td>Gerente</td>
                                                @elseif($item->position === '1')
                                                <td>Programador</td>
                                                @elseif($item->position === '2')
                                                <td>Diseñador</td>
                                                @elseif($item->position === '3')
                                                <td>Contratista</td>
                                                @endif
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>







<style>
    #chart {
  max-width: 650px;
  margin: 35px auto;
}
</style>

<div id="chart">
</div>



                

                <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Tabla de Hosting</h3>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Avatar</th>
                                                <th>Cliente</th>
                                                <th>URL</th>
                                                <th>Fecha de creación</th>
                                                <th>Fecha de vencimiento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hosting as $item)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                @if(!$item->getMedia('photo')->isEmpty())
                                                <th><img class="rounded-circle" width="50px" height="50px" src="{{ $item->photoUrl }}" /></th>
                                                @else
                                                <th><img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft.png') }}" /></th>
                                                @endif
                                                <td>{{ $item->client }}</td>
                                                <td><a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></td>
                                                <td>{{ $item->create_date }}</td>
                                                <td>{{ $item->due_date }}</td>
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
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>

@endsection