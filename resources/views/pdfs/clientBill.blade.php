@extends('layouts.bills')

@section('date')
    Fecha: {{ date('d-m-Y', strtotime($bill->date)) }}
@endsection

@section('bill-number')
    {{ $bill->id }}
@endsection

@section('type')
    @if ($bill->type == 'C')
        Cliente
    @else
        Hosting
    @endif
@endsection

@section('name')
    @if ($bill->type == 'C')
        {{ $bill->user->name }} {{ $bill->user->last_name }}
    @else
        {{ $bill->hosting->url }}
    @endif
@endsection

@section('content')
    @foreach ($bill->details as $detail)
        <tr>
            <td>{{ $detail->description }}</td>
            <td>{{ $detail->units }}</td>
            <td>{{ number_format($detail->price, 2, '.', ',') }}$</td>
            <td>{{ number_format($detail->price * $detail->units, 2, '.', ',') }}$</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3" style="text-align: right;"> Total Parcial</td>
        <td>{{ number_format($bill->amount, 2, '.', ',') }}$</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right;"> Descuento</td>
        <td>
            @if (!is_null($bill->payment))
                {{ number_format($bill->payment->discount_amount, 2, '.', ',') }}$
            @else
                0.00$
            @endif
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right;"><b> Pagado</b></td>
        <td>
            @if (!is_null($bill->payment))
                <b>{{  number_format($bill->payment->total, 2, '.', ',')  }}$</b>
            @else
                <b>{{ number_format($bill->amount, 2, '.', ',') }}$</b>
            @endif
        </td>
    </tr>
@endsection