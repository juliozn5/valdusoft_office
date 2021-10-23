<table>
    <thead>
    <tr>
        <th><b>#</b></th>
        <th><b>Empleado</b></th>
        <th><b>Precio por Hora</b></th>
        <th><b>Horas Trabajadas</b></th>
        <th><b>Total Horas</b></th>
        <th><b>Bonos</b></th>
        <th><b>Préstamo / Abono</b></th>
        <th><b>TOTAL QUINCENA</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($payroll_employees as $payroll)
        <tr>
            <td>{{ $payroll->id }}</td>
            <td>{{ $payroll->user->name }} {{ $payroll->user->last_name }}</td>
            <td>{{ $payroll->price_by_hour }}$</td>
            <td>{{ $payroll->total_hours }}</td>
            <td>{{ $payroll->total_hours * $payroll->price_by_hour }}$</td>
            <td>
                @if (!is_null($payroll->bond))
                    {{ $payroll->bond->amount }}$
                @else
                    0$
                @endif
            </td>
            <td>
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
            <td>{{ $payroll->total_amount }}$</td>
        </tr>
    @endforeach
    </tbody>
</table>