@extends('layouts.prod')
@section('content')

    <nav class="arrivals_product center">
        <h2 class="arrivals_title">Корзина</h2>
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
    </nav>

    <div class="content center" style="margin-top: 30px;">
        <div class="left_basis_block border_for_test line_shopping_1 line__shopping">
            Товар
        </div>
        <div class="block_shopping_1 proba_standart_parameter_top line_shopping_1 border_for_test">
            Цена за вещь
        </div>
        <div class="block_shopping_2 proba_standart_parameter_top line_shopping_1 border_for_test">
            Количество
        </div>
        <div class="block_shopping_3 proba_standart_parameter_top line_shopping_1 border_for_test">
            Скидка
        </div>
        <div class="block_shopping_4 proba_standart_parameter_top line_shopping_1 border_for_test">
            Цена всего
        </div>
    </div>
    @forelse($goodsInBasket as $goodInBasket)
        <div class="content center">
            <div class="left_basis_block border_for_test">
                <a href="{{route('siteOneGood', [
                                            'id' => $goodInBasket->id,
                                             'tableId' => $goodInBasket->table_id,
                                             'link' => 2,
                                             'orderId' => 0
                                             ])}}" class="link_to_product">
                    @if($goodInBasket->img)
                        <img class="shopping__image hover_shopping__image"
                             src="{{ \Storage::disk('public')->url( $goodInBasket->img) }}" alt="avatar">
                    @else
                        <img class="shopping__image hover_shopping__image"
                             src="/img/no_photo.jpg" alt="avatar">
                    @endif
                    <div class="shopping_main_text">
                        <p class="shopping_line_title">
                            {{ $goodInBasket->name }}
                        </p>
                        <div class="shopping__plus_text">
                            <span class="shopping_text1">Пол:</span>
                            <span class="shopping_text2">{{ $goodInBasket->sex }}</span>
                            <br>
                            <span class="shopping_text1">Размер:</span>
                            <span class="shopping_text2">{{ $goodInBasket->size }}</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="block_shopping_1 proba_standart_parameter border_for_test line__shopping_other">
                {{ $goodInBasket->price }}&#8381;
            </div>
            <div class="block_shopping_2 proba_standart_parameter border_for_test line__shopping_other">
                <a href="{{route('delFromBasket',[
                                                      'id' => $goodInBasket->id,
                                                      'tableId' => $goodInBasket->table_id,
                                                      'link' => 2
                                                      ])}}">
                    <i class="fas fa-minus" style="cursor: pointer; margin-right: 4px;"></i>
                </a>
                {{ $goodInBasket->counter }}шт.
                <a href="{{route('addToBasket', [
                                                     'id' => $goodInBasket->id,
                                                     'tableId' => $goodInBasket->table_id,
                                                     'link' => 2
                                                     ])}}">
                    <i class="fas fa-plus" style="cursor: pointer; margin-left: 4px;"></i>
                </a>
            </div>
            <div class="block_shopping_3 proba_standart_parameter border_for_test line__shopping_other">
                @if($goodInBasket->sale)
                    действует
                @else
                    не действует
                @endif
            </div>
            <div class="block_shopping_4 proba_standart_parameter border_for_test line__shopping_other">
                {{ $goodInBasket->price_quantity }}&#8381;
            </div>
        </div>
    @empty
        <div class="content center">
            <div>данные отсутствуют</div>
        </div>
    @endforelse
    <div class="coup_discont center">
        <div class="coup_block3">
            <div class="coup__sub_block3">
                <div>
                    <span class="sub__total_price">Всего товаров</span><span
                        class="sub__total_price ml_distance">{{ $totalGoods }}шт.</span>
                </div>
                <div>
                    <span class="coup_title">ОБЩАЯ СУММА</span><span
                        class="coup_title_special_color ml_distance">{{ $sumOfBasket }}&#8381;</span>
                </div>
            </div>
            <a class="to__checkout text__coupon_position"
               href="{{ route('sendOrder', [
                                    'count' => $totalGoods,
                                    'sum' => $sumOfBasket
                                    ]) }}">оформить заказ
            </a>
        </div>
    </div>

@endsection
