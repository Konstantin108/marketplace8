@extends('layouts.prod')
@section('content')

    <nav class="arrivals_product center">
        <h2 class="arrivals_title">Мои заказы</h2>
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
    </nav>

    <div class="content center" style="margin-top: 30px;">
        <div class="block_shopping_1 proba_standart_parameter_top line_shopping_1 border_for_test">
            Номер заказа
        </div>
        <div class="block_shopping_1 proba_standart_parameter_top line_shopping_1 border_for_test"
             style="width: 200px;">
            Просмотр
        </div>
        <div class="block_shopping_1 proba_standart_parameter_top line_shopping_1 border_for_test"
             style="width: 250px;">
            Количество товаров
        </div>
        <div class="block_shopping_2 proba_standart_parameter_top line_shopping_1 border_for_test">
            Сумма
        </div>
        <div class="block_shopping_3 proba_standart_parameter_top line_shopping_1 border_for_test"
             style="width: 220px">
            Статус
        </div>
        <div class="block_shopping_4 proba_standart_parameter_top line_shopping_1 border_for_test">
            Дата создания
        </div>
    </div>
    @forelse($orders as $order)
        <div class="content center">
            <div class="block_shopping_1 proba_standart_parameter border_for_test line__shopping_other">
                #{{ $order->id }}
            </div>
            <div class="block_shopping_1 proba_standart_parameter border_for_test line__shopping_other"
                 style="width: 200px;">
                <a href="{{route('getThisOrder', ['id' => $order->id])}}" class="button"
                   style="height: 20px; padding-bottom: 29px; padding-top: 1px;">
                    перейти
                </a>
            </div>
            <div class="block_shopping_1 proba_standart_parameter border_for_test line__shopping_other"
                 style="width: 250px;">
                {{ $order->count }}шт.
            </div>
            <div class="block_shopping_2 proba_standart_parameter border_for_test line__shopping_other">
                {{ $order->sum }}&#8381;
            </div>
            <div class="block_shopping_3 proba_standart_parameter border_for_test line__shopping_other"
                 style="width: 220px">
                {{ $order->status }}
            </div>
            <div class="block_shopping_4 proba_standart_parameter border_for_test line__shopping_other">
                {{ $order->created_at->format('Y:m:d') }}
            </div>
        </div>
    @empty
        <div class="content center" style="width: 1px;height: 217px;">
            <div>данные отсутствуют</div>
        </div>
    @endforelse

@endsection
