@extends('layouts.main')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif

    <form method="post"
          action="{{ route('updateOrderStatusByAdmin', ['id' => $order->id])}}"
          enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">
            <h1>Заказ №{{ $order->id }}</h1>
            <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
            <tr style="border: 2px solid black">
                <th style="border: 2px solid black">#ID</th>
                <th style="border: 2px solid black; color: blue">ID/ИМЯ пользователя</th>
                <th style="border: 2px solid black">Количество товаров</th>
                <th style="border: 2px solid black">Товары</th>
                <th style="border: 2px solid black">Сумма</th>
                <th style="border: 2px solid black">Статус</th>
                <th style="border: 2px solid black">Дата создания</th>
            </tr>
            </thead>
            <tbody>
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('user', ['id' => $order->user_id, 'link' => 3, 'order_id' => $order->id])}}">
                        {{ $order->id }} {{ \App\Models\User::findOrFail($order->user_id)->name }}
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $order->count }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    @forelse($goodsInOrder as $good)
                        <div style="display: flex; margin-bottom: 3px;">
                            @if($good->img)
                                <img src="{{ \Storage::disk('public')->url( $good->img) }}" alt="avatar"
                                     style="width: 50px; border-radius: 50%">
                            @else
                                <img src="/img/no_photo.jpg" alt="avatar" style="width: 50px; border-radius: 50%">
                            @endif
                            @if($good->name != 'Товар отсутствует')
                                <div style="display: flex; flex-direction: column">
                                    <a href="{{route('oneGood', [
                                                    'id' => $good->id,
                                                    'link' => 2,
                                                    'order_id' => $order->id
                                                    ])}}">
                                        {{ $good->name }}
                                    </a>
                                    {{ $good->price }}&#8381; {{$good->counter }}шт.<br>
                                </div>
                            @else
                                <div style="display: flex; flex-direction: column">
                                    <p>
                                        {{ $good->name }}
                                    </p>
                                    {{ $good->price }}&#8381; {{$good->counter }}шт.<br>
                                </div>
                            @endif
                        </div>
                    @empty
                        <p>нет данных</p>
                    @endforelse
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->sum }}&#8381;</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <select id="status" name="status">
                        <option value="{{ $order->status }}">{{ $order->status }}</option>
                        <option value="ожидает подтверждения">
                            ожидает подтверждения
                        </option>
                        <option value="сборка заказа">
                            сборка заказа
                        </option>
                        <option value="заказ в пути">
                            заказ в пути
                        </option>
                        <option value="заказ ожидает выдачи">
                            заказ ожидает выдачи
                        </option>
                        <option value="заказ выполнен">
                            заказ выполнен
                        </option>
                        <option value="заказ отменён">
                            заказ отменён
                        </option>
                    </select>
                    <button type="submit" class="btn btn-success">сохранить</button>
                    <a href="{{route('deleteOrder', ['id' => $order->id])}}">Удалить</a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $order->created_at->format('Y:m:d') }}</td>
            </tr>
            </tbody>
        </table>
    </form>
    <a href="{{route('allOrders')}}">Назад</a>

@endsection
