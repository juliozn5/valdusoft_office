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
</style>
@endpush

@push('custom_js')
<script>
    /* var options = {
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
        }*/
    var lineAreaOptions = {
        chart: {
            height: 350,
            type: 'area',
            foreColor: "#999",
            stacked: true,
            dropShadow: {
                enabled: true,
                enabledSeries: [0],
                top: 0,
                left: 0,
                blur: 0,
                opacity: 1
            },
            zoom: {
                enabled: false
            }
        },
        colors: ['#650865', '#003573'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: "smooth",
            width: 3
        },
        series: [{
                name: 'Costos',
                data: [310, 400, 280, 510, 420, 1090, 1000, 310, 400, 280, 510, 420]
            },
            {
                name: 'Ganancias',
                data: [110, 320, 450, 320, 340, 520, 410, 110, 320, 450, 320, 340]
            }
        ],
        xaxis: {
            type: 'year',
            categories: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        },
        yaxis: {
            opposite: false,
            labels: {
                formatter: function(value) {
                    return value + "K";
                }
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left'
        },
    }
    var lineAreaChart = new ApexCharts(
        document.querySelector("#timeline-chart"),
        lineAreaOptions
    );
    lineAreaChart.render();
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
                            <div class="card-content p-1">
                                <div class="card-body">
                                    <img src="{{ asset('images/svg/ilustracion_clientes.svg') }}" class="float-right pl-2" width="150" height="150" alt="">
                                    <h4 class="pt-2">Consulta todos los clientes</h4>
                                    <a href="{{ route('admin.clients.list') }}" class="btn btn-client mt-1"><b>Ver clientes</b></a>
                                </div>
                            </div>
                        </div>

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

                    <div class="col-7">
                        <div class="card">
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Telefono</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $item)
                                            <tr>
                                                <td>
                                                    @if (!is_null($item->photo))
                                                    <img class="rounded-circle" width="32px" height="32px" src="{{ $item->photo }}" />
                                                    @else
                                                    <img class="rorounded-circleund" width="32px" height="32px" src="{{ asset('images/valdusoft/valdusoft.png') }}" />
                                                    @endif
                                                </td>
                                                <td>{{ $item->name }} {{ $item->last_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td><a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"></a>{{ $item->phone }}</td>
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
                    <div class="card p-1">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Costos vs Ganancias</h3>
                        </div>
                        <div class="card-content">
                            <div id="timeline-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Listado de Hosting</h3>
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