@extends('layouts.bills')

@section('date')
    Inicio: {{ date('d-m-Y', strtotime($bill->payroll_employee->payroll->start_date)) }}<br>
    Fin: {{ date('d-m-Y', strtotime($bill->payroll_employee->payroll->dead_line)) }}
@endsection

@section('bill-number')
    {{ $bill->id }}
@endsection

@section('type')
    Empleado
@endsection

@section('name')
    {{ $bill->user->name }} {{ $bill->user->last_name }}
@endsection

@section('content')
    <tr>
        <td>Horas acumuladas en la quincena</td>
        <td>{{ $bill->payroll_employee->total_hours }}</td>
        <td>{{ number_format($bill->payroll_employee->price_by_hour, 2, '.', ',') }}</td>
        <td>{{ number_format($bill->payroll_employee->price_by_hour * $bill->payroll_employee->total_hours, 2, '.', ',') }}</td>
    </tr>
    @if(!is_null($bill->payroll_employee->bond))
        <tr>
            <td>{{ $bill->payroll_employee->bond->description }}</td>
            <td>1</td>
            <td>{{ number_format($bill->payroll_employee->bond->amount, 2, '.', ',') }}</td>
            <td>{{ number_format($bill->payroll_employee->bond->amount, 2, '.', ',') }}</td>
        </tr>
    @endif
    @if(!is_null($bill->payroll_employee->financing))
        <tr>
            <td>{{ $bill->payroll_employee->financing->description }}</td>
            <td>1</td>
            <td>{{ number_format($bill->payroll_employee->financing->total_amount, 2, '.', ',') }}</td>
            <td>{{ number_format($bill->payroll_employee->financing->total_amount, 2, '.', ',') }}</td>
        </tr>
    @endif
    @if(!is_null($bill->payroll_employee->financing_payment))
        <tr>
            <td>{{ $bill->payroll_employee->financing_payment->description }}</td>
            <td>1</td>
            <td>{{ number_format($bill->payroll_employee->financing_payment->amount, 2, '.', ',') }}</td>
            <td>- {{ number_format($bill->payroll_employee->financing_payment->amount, 2, '.', ',') }}$</td>
        </tr>
    @endif
    <tr>
        <td colspan="3" style="text-align: right;"> Total Parcial</td>
        <td>{{ number_format($bill->amount, 2, '.', ',') }}</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right;"> Descuento</td>
        <td>
            @if (!is_null($bill->payment))
                {{ number_format($bill->payment->discount_amount, 2, '.', ',') }}
            @else
                0.00$
            @endif
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right;"><b> Pagado</b></td>
        <td>
            @if (!is_null($bill->payment))
                <b>{{  number_format($bill->payment->total, 2, '.', ',')  }}</b>
            @else
                <b>{{ number_format($bill->amount, 2, '.', ',') }}</b>
            @endif
        </td>
    </tr>
@endsection
