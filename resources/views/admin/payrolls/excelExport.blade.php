<div style="width: 100%; padding-top: 40px; padding-left: 8%; padding-right: 8%;">
    <table style="width: 100%;">
        <thead>
            <tr>
                <th style="background: #6C016C; color: #ffffff; text-align: center;"><b>#</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 15%"><b>Empleado</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 15%"><b>Billetera</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 14%"><b>Precio por Hora</b>
                </th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 16%"><b>Horas Trabajadas</b>
                </th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 12%"><b>Total Horas</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center;"><b>Bonos</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 16%"><b>Préstamo / Abono</b>
                </th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 16%"><b>TOTAL QUINCENA</b>
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach($payroll_employees as $item)
            <tr>
                <td style="text-align: center; border: solid;">{{ $item->id }}</td>
                <td style="text-align: center; border: solid;">{{ $item->user->name }} {{ $item->user->last_name }}</td>
                 <td style="text-align: center; border: solid;">{{ $item->user->tron_wallet }}</td>
                <td style="text-align: center; border: solid;">{{number_format($item->price_by_hour, 2, ',', '.')}}$</td>
                <td style="text-align: center; border: solid;">{{number_format($item->total_hours, 2, ',', '.')}}</td>
                <td style="text-align: center; border: solid;">{{number_format($item->total_hours * $item->price_by_hour, 2, ',', '.')}}$</td>

                <td style="text-align: center; border: solid;">
                    @if (!is_null($item->bond))
                    {{number_format($item->bond->amount, 2, ',', '.')}}$
                    @else
                    {{number_format(0, 2, ',', '.')}}$
                    @endif
                </td>

                <td style="text-align: center; border: solid;">
                    @if (!is_null($item->financing))
                    + {{number_format($item->financing->total_amount, 2, ',', '.')}}$
                    @else
                    @if (!is_null($item->financing_payment))
                    - {{number_format($item->financing_payment->amount, 2, ',', '.')}}$
                    @else
                    {{number_format(0, 2, ',', '.')}}$
                    @endif
                    @endif
                </td>

                <td style="text-align: center; border: solid;">{{number_format($item->total_amount, 2, ',', '.')}}$</td>
            </tr>
            @endforeach

            <tr>
                <th colspan="6"></th>
                <th style="background-color: #6C016C; text-align: center; color: white;"><span><b>TOTAL:</b></span></th>
                <th style="background-color: #6C016C; text-align: center; color: white;"><span><b>{{number_format($payroll->amount, 2, ',', '.')}}$</b></span></th>
            </tr>
        </tbody>
    </table>
</div>
 