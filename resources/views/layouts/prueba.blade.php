<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Document</title>

        <style>
            .table th {
                padding: 0.45rem;
                vertical-align: meddium;
                border-top: 1px solid #F8F8F8;
                background-color: #6C016C; 
                color: white;
                text-align: center;
                font-size: 14px;
            }
            .table td{
                padding: 0.35rem;
                vertical-align: meddium;
                border: solid #BFBFBF 1px;
                font-size: 13px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <header style="background-color: #170c66; height: 20px;"></header>

        <div>
            {{-- Encabezado Izquierdo--}}
            <div style="width: 60%; float: left; padding-top: 10%; padding-left: 8%;">
                <div style="color: #333F4F; font-size: 20px; font-weight: bold; padding-bottom: 5px;">
                    Valdusoft
                </div>
                <div style="color: #333F4F; font-size: 16px; line-height: 25px;">
                    San Cristobal - Tachira <br>
                    <a href="https://valdusoft.com" target="_blank" style="color: #170c66;"><u>Valdusoft.com</u></a><br>			
                    <a href="mailto:financiero@valdusoft.com" target="_blank">financiero@valdusoft.com</a><br>					
                    <b>Alexis Valera</b>
                </div>
            </div>

            {{-- Encabezado Derecho --}}
            <div style="width: 40%; float: right; padding-top: 5%; font-size: 14px; color: #000000; text-align: center;">
                <img src="https://clients.valdusoft.com/images/valdusoft/logo-bill.jpg" alt="" width="120" height="70">
                <hr style="width: 140px; background-color: #BFBFBF; margin-top: 0 !important; margin-bottom: 10px !important;">
                <div>
                    27.04.2021
                </div>
                <div style="margin-top: 10px; font-size: 13px;">
                    <span style="color: #170c66; font-weight: bold;">Nº de Factura</span>
                    <hr style="width: 140px; background-color: #BFBFBF; margin-top: 5px !important; margin-bottom: 5px !important;">
                    138 
                </div>
            
            </div>
        </div>
        

        {{-- Sección Cliente --}}
        <div style="width: 40%; padding-top: 270px; padding-left: 8%;">
            <div style="color: #333F4F; font-size: 16px; font-weight: bold; border-bottom: solid #BFBFBF 1px; padding-bottom: 5px;">
                Cliente
            </div>
            <div style="margin-top: 10px; color: #000000;">
               Union Capital 
            </div>
        </div>

         {{-- Tabla de Descripción --}}
        <div style="width: 100%; padding-top: 40px; padding-left: 8%; padding-right: 20%;">
                <table>
                    <thead>
                        <th style="width: 55%;">Descripción</th>
                        <th style="width: 15%;">Unidades</th>
                        <th style="width: 15%;">Precio Unitario</th>
                        <th style="width: 15%;">Precio</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>
        </div>

        <footer style="background-color: #170c66; height: 20px;"></footer>
    </body>
</html>