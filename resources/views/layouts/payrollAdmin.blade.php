<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Document</title>

        
        <style>
            @page {
                margin: 0cm 0cm;
                font-family: Arial;
            }
        
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 30px;
                background-color: #170c66;
            }
            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 30px;
                background-color: #170c66;
            }
            table{
                border-spacing: 0px;
            }
            table th {
                padding: 0.45rem;
                vertical-align: meddium;
                background-color: #6C016C; 
                color: white;
                text-align: center;
                font-size: 14px;
            }
            table td{
                padding: 0.35rem;
                vertical-align: meddium;
                border: solid #BFBFBF 1px;
                font-size: 13px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <header></header>

        <div>
            {{-- Encabezado Izquierdo--}}
            <div style="width: 60%; float: left; padding-top: 10%; padding-left: 8%;">
                <div style="color: #333F4F; font-size: 20px; font-weight: bold; padding-bottom: 5px;">
                    Valdusoft
                </div>
                <div style="color: #333F4F; font-size: 16px; line-height: 25px;">
                    San Cristobal - Táchira <br>
                    <a href="https://valdusoft.com" target="_blank" style="color: #170c66;"><u>Valdusoft.com</u></a><br>			
                    <a href="mailto:financiero@valdusoft.com" target="_blank">financiero@valdusoft.com</a><br>					
                    <b>Alexis Valera</b>
                </div>
            </div>

            {{-- Encabezado Derecho --}}
            <div style="width: 40%; float: right; padding-top: 5%; font-size: 14px; line-height: 20px; color: #000000; text-align: center;">
                <img src="https://clients.valdusoft.com/images/valdusoft/logo-bill.jpg" alt="" width="120" height="70">
                <hr style="width: 140px; background-color: #BFBFBF; margin-top: 0 !important; margin-bottom: 10px !important;">
                <div>
                    @yield('date')
                </div>
                <div style="margin-top: 10px; font-size: 13px;">
                    <span style="color: #170c66; font-weight: bold;">Nº de Nómina</span>
                    <hr style="width: 140px; background-color: #BFBFBF; margin-top: 5px !important; margin-bottom: 5px !important;">
                    @yield('payroll-number')
                </div>
            
            </div>
        </div>
        

        {{-- Sección Cliente --}}
        <div style="width: 40%; padding-top: 270px; padding-left: 8%;">
            <div style="color: #333F4F; font-size: 16px; font-weight: bold; border-bottom: solid #BFBFBF 1px; padding-bottom: 5px;">
                @yield('type')
            </div>
            {{-- <div style="margin-top: 10px; color: #000000;">
               @yield('name')
            </div> --}}
        </div>

         {{-- Tabla de Descripción --}}
        <div style="width: 100%; padding-top: 40px; padding-left: 8%; padding-right: 8%;">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th><b>#</b></th>
                        <th><b>Empleado</b></th>
                        <th><b>Billetera USDT</b></th>
                        <th><b>Precio por Hora</b></th>
                        <th><b>Horas Trabajadas</b></th>
                        <th><b>Total Horas</b></th>
                        <th><b>Bonos</b></th>
                        <th><b>Préstamo / Abono</b></th>
                        <th><b>TOTAL QUINCENA</b></th>
                    </tr>
                </thead>
                <tbody>
                    @yield('content')
                </tbody>
            </table>
        </div>

        <footer></footer>
    </body>
</html>