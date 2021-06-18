@extends('layouts.app')

@push('body-atribute')
    class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/datatables.min.css"/>

    <style>
        .btn-primary{
            border-color: #003573 !important;
            background-color: #003573 !important;
            color: #FFFFFF;
        }

        .btn-client{
            border-color: #8f138f !important;
            background-color: #650865 !important;
            color: #FFFFFF;
        }
        @import url('https://fonts.googleapis.com/css?family=Poppins');

        * {
        font-family: 'Poppins', sans-serif;
        }

        #chart {
            max-width: auto;
            margin: 35px auto;
            opacity: 0.9;
        }

        #timeline-chart .apexcharts-toolbar {
            opacity: 1;
            border: 0;
        }
    </style>
@endpush

@push('custom_js')
    <script>
        var options = {
        chart: {
            type: "area",
            height: 500,
            foreColor: "#999",
            stacked: true,
            dropShadow: {
            enabled: true,
            enabledSeries: [0],
            top: -2,
            left: 2,
            blur: 5,
            opacity: 0.06
            }
        },
        colors: ['#650865', '#003573'],
        stroke: {
            curve: "smooth",
            width: 3
        },
        dataLabels: {
            enabled: false
        },
        series: [{
            name: 'Costos',
            data: generateDayWiseTimeSeries(0, 18)
        }, {
            name: 'Ganancias',
            data: generateDayWiseTimeSeries(1, 18)
        }],
        markers: {
            size: 0,
            strokeColor: "#fff",
            strokeWidth: 3,
            strokeOpacity: 1,
            fillOpacity: 1,
            hover: {
            size: 6
            }
        },
        xaxis: {
            type: "datetime",
            axisBorder: {
            show: true
            },
            axisTicks: {
            show: true
            }
        },
        yaxis: {
            labels: {
            offsetX: 14,
            offsetY: -5
            },
            tooltip: {
            enabled: true
            }
        },
        grid: {
            padding: {
            left: -5,
            right: 5
            }
        },
        tooltip: {
            x: {
            format: "dd MMM yyyy"
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left'
        },
        fill: {
            type: "solid",
            fillOpacity: 0.7
        }
        };

        var chart = new ApexCharts(document.querySelector("#timeline-chart"), options);

        chart.render();

        function generateDayWiseTimeSeries(s, count) {
        var values = [[
            4,3,10,9,29,19,25,9,12,7,19,5,13,9,17,2,7,5
        ], [
            2,3,8,7,22,16,23,7,11,5,12,5,10,4,15,2,6,2
        ]];
        var i = 0;
        var series = [];
        var x = new Date().getTime();
        while (i < count) {
            series.push([x, values[s][i]]);
            x += 86400000;
            i++;
        }
        return series;
        }
        
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/datatables.min.js"></script>

    <script>
        $('.myTable').DataTable({
            responsive: true
        })
    </script>
@endpush

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
                    <div class="col-5">

                        <div class="card">
                            <div class="card-content pl-1">
                                <div class="card-body">
                                <img src="{{ asset('images/svg/ilustracion_clientes.svg') }}" class="float-right pl-2" width="150" height="150" alt="">
                                    <h4 class="pt-2">Consulta todos los clientes</h4>
                                <a href="{{ route('admin.clients.list') }}" class="btn btn-client mt-1"><b>Ver clientes</b></a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                          <div class="card-content pl-1">
                              <div class="card-body">
                              <img src="{{ asset('images/svg/ilustracion_nomina.svg') }}" class="float-right pl-2" width="150" height="150" alt="">
                                  <h4 class="pt-2">Consulta y paga la nomina</h4>
                                <a href="{{ route('admin.payrolls.list') }}" class="btn btn-primary mt-1"><b>Ver nómina</b></a>
                              </div>
                          </div>
                      </div>
                        
                    </div>

                    <div class="col-7">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Empleados</h3>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive p-1">
                                    <table class="table nowrap scroll-horizontal-vertical myTable table-striped" data-page-length='2'>
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
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if (!is_null($item->photo))
                                                            <img class="rounded-circle" width="50px" height="50px" src="{{ $item->photo }}" />
                                                        @else
                                                            <img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft/valdusoft.png') }}" />
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    @if($item->position === '0')
                                                    <td>Desarrollador</td>
                                                    @elseif($item->position === '1')
                                                    <td>Diseñador</td>
                                                    @elseif($item->position === '2')
                                                    <td>Project Manager,</td>
                                                    @elseif($item->position === '3')
                                                    <td>Financiero</td>
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

                <div id="chart">
                    <div id="timeline-chart"></div>
                  </div>

                <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Listado de Hosting</h3>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive p-1">
                                    <table class="table nowrap scroll-horizontal-vertical myTable table-striped" data-page-length='5'>
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
                                                <th><img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft/valdusoft.png') }}" /></th>
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

        </div>
    </div>
</div>

@endsection