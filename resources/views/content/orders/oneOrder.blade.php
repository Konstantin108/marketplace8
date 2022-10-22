@extends('layouts.prod')
@section('content')

    <nav class="arrivals_product center">
        <h2 class="arrivals_title">Заказ #{{ $order->id }}</h2>
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
    </nav>

    <form method="post"
          action="{{ route('updateOrderStatus', ['id' => $order->id])}}"
          enctype="multipart/form-data">
        @csrf
        <div class="content center" style="margin-top: 30px;">
            <div class="block_shopping_1 proba_standart_parameter_top line_shopping_1 border_for_test">
                Номер заказа
            </div>
            <div class="block_shopping_1 proba_standart_parameter_top line_shopping_1 border_for_test"
                 style="width: 240px;">
                Количество товаров
            </div>
            <div class="block_shopping_1 proba_standart_parameter_top line_shopping_1 border_for_test"
                 style="width: 350px;">
                Товары
            </div>
            <div class="block_shopping_2 proba_standart_parameter_top line_shopping_1 border_for_test">
                Сумма
            </div>
            <div class="block_shopping_3 proba_standart_parameter_top line_shopping_1 border_for_test"
                 style="width: 160px">
                Статус
            </div>
            <div class="block_shopping_4 proba_standart_parameter_top line_shopping_1 border_for_test"
                 style="width: 130px;">
                Дата создания
            </div>
        </div>
        <div class="content center">
            <div class="block_shopping_1 proba_standart_parameter2 border_for_test line__shopping_other2"
                 style="text-align: center">
                #{{ $order->id }}
            </div>
            <div class="block_shopping_1 proba_standart_parameter2 border_for_test line__shopping_other2"
                 style="width: 240px; text-align: center">
                {{ $order->count }}шт.
            </div>
            <div class="block_shopping_2 proba_standart_parameter2 border_for_test line__shopping_other2"
                 style="width: 350px;">
                @forelse($goodsInOrder as $good)
                    <div style="display: flex; margin-bottom: 3px; flex-direction: column">
                        @if($good->img)
                            <img src="{{ \Storage::disk('public')->url( $good->img) }}" alt="avatar"
                                 style="width: 50px; border-radius: 50%">
                        @else
                            <img src="/img/no_photo.jpg" alt="avatar" style="width: 50px; border-radius: 50%">
                        @endif
                        @if($good->name != 'Товар отсутствует')
                            <div style="display: flex; flex-direction: column">
                                <a href="{{route('siteOneGood', [
                                                    'id' => $good->id,
                                                    'tableId' => $good->table_id,
                                                    'link' => 3,
                                                    'orderId' => $order->id
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
            </div>
            <div class="block_shopping_3 proba_standart_parameter2 border_for_test line__shopping_other2"
                 style="text-align: center">
                {{ $order->sum }}&#8381;
            </div>
            <div class="block_shopping_4 proba_standart_parameter2 border_for_test line__shopping_other2"
                 style="width: 160px">
                @if($order->status != 'заказ отменён')
                    <div style="display: block; height: 50px;">
                        <select id="status" name="status">
                            <option value="{{ $order->status }}">{{ $order->status }}</option>
                            <option value="заказ отменён">
                                отменить заказ
                            </option>
                        </select>
                        <button type="submit"
                                class="button"
                                style="height: 20px; padding-bottom: 29px; padding-top: 1px; outline: none; border: none">
                            сохранить
                        </button>
                    </div>
                @else
                    {{ $order->status }}
                @endif
            </div>
            <div class="block_shopping_4 proba_standart_parameter2 border_for_test line__shopping_other2"
                 style="width: 130px; text-align: end">
                {{ $order->created_at->format('Y:m:d') }}
            </div>
        </div>
    </form>
    <div class="button_clear_and_continue center">
        <a class="clear__cart"
           style="text-align: center; padding-top: 16px;"
           href="{{route('allMyOrders')}}">
            Назад
        </a>
    </div>

@endsection
