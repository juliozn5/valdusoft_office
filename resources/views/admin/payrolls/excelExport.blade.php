<div style="width: 100%; padding-top: 40px; padding-left: 8%; padding-right: 8%;">
    <table style="width: 100%;">
        <thead>
            <tr>
                <th style="background: #6C016C; color: #ffffff; text-align: center;"><b>#</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 15%"><b>Empleado</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 14%"><b>Precio por Hora</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 16%"><b>Horas Trabajadas</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 12%"><b>Total Horas</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center;"><b>Bonos</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 16%"><b>Préstamo / Abono</b></th>
                <th style="background: #6C016C; color: #ffffff; text-align: center; width: 16%"><b>TOTAL QUINCENA</b></th>
            </tr>
        </thead>

        <tbody>
            @foreach($payroll_employees as $payroll)
            <tr>
                <td style="text-align: center; border: solid;">{{ $payroll->id }}</td>
                <td style="text-align: center; border: solid;">{{ $payroll->user->name }} {{ $payroll->user->last_name }}</td>
                <td style="text-align: center; border: solid;">{{ $payroll->price_by_hour }}$</td>
                <td style="text-align: center; border: solid;">{{ $payroll->total_hours }}</td>
                <td style="text-align: center; border: solid;">{{ $payroll->total_hours * $payroll->price_by_hour }}$</td>
                <td style="text-align: center; border: solid;">
                    @if (!is_null($payroll->bond))
                    {{ $payroll->bond->amount }}$
                    @else
                    0$
                    @endif
                </td>
                <td style="text-align: center; border: solid;">
                    @if (!is_null($payroll->financing))
                    + {{ $payroll->financing->total_amount }}$
                    @else
                    @if (!is_null($payroll->financing_payment))
                    - {{ $payroll->financing_payment->amount }}$
                    @else
                    0$
                    @endif
                    @endif
                </td>
                <td style="text-align: center; border: solid;">{{ $payroll->total_amount }}$</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
