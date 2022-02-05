@extends('layouts.payrollAdmin')

@section('date')
Fecha: {{ date('Y-m-d') }}
@endsection

@section('payroll-number')
{{ $payroll->id }}
@endsection

@section('type')
Listado de empleados en la Nómina
@endsection

@section('name')

@endsection

@section('content')
@foreach($payroll_employees as $item)
<tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->user->name }} {{ $item->user->last_name }}</td>
    <td>{{ $item->user->tron_wallet}}</td>
    <td>{{number_format($item->price_by_hour, 2, ',', '.')}}$</td>
    <td>{{number_format($item->total_hours, 2, ',', '.')}}</td>
    <td>{{number_format($item->total_hours * $item->price_by_hour, 2, ',', '.')}}$</td>
    <td>
        @if (!is_null($item->bond))
        {{number_format($item->bond->amount, 2, ',', '.')}}$
        @else
        {{number_format(0, 2, ',', '.')}}$
        @endif
    </td>
    <td>
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
    <td>{{number_format($item->total_amount, 2, ',', '.')}}$</td>
</tr>
@endforeach

<tr>
    <th colspan="6"></th>
    <th class="text-center" style="background-color: #62626a;"><span style="color: white;">TOTAL:</span></th>
    <th class="text-left" style="background-color: #62626a;"><span style="color: white;">{{number_format($payroll->amount, 2, ',', '.')}}$</span></th>
</tr>
@endsection