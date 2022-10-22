@extends('layouts.main')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif

    <table class="table table-bordered">
        <h1>Список заказов пользователей</h1>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black; color: blue">LINK</th>
            <th style="border: 2px solid black; color: blue">ID/ИМЯ пользователя</th>
            <th style="border: 2px solid black">Количество товаров</th>
            <th style="border: 2px solid black">Сумма</th>
            <th style="border: 2px solid black">Статус</th>
            <th style="border: 2px solid black">Дата создания</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('getOrder', ['id' => $order->id])}}">
                        перейти
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('user', ['id' => $order->user_id, 'link' => 2, 'order_id' => 0])}}">
                        {{ $order->id }} {{ \App\Models\User::findOrFail($order->user_id)->name }}
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $order->count }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->sum }}&#8381;</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->status }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->created_at->format('Y:m:d') }}</td>
            </tr>
        @empty
            <td colspan="4">данные отсутствуют</td>
        @endforelse
        </tbody>
    </table>

@endsection
