@push('custom_js')
<script>
    axios.get('../admin/dataGrafica').then( function(response){

        console.log("Datos de la grafica")
        console.log(response)

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
                    name: 'Gastos',
                    data: response.data.valores.data_empleados
                },
                {
                    name: 'Ganancia',
                    data: response.data.valores.data_cliente
                }
            ],
            xaxis: {
                type: 'year',
                categories:  response.data.valores.data_mes, //["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            },
            yaxis: {
                opposite: false,
                labels: {
                    formatter: function(value) {
                        return value + "$";
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

    }).catch(e => console.log(e))

</script>
@endpush
