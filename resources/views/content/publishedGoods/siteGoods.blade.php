@extends('layouts.prod')
@section('content')

    <nav class="arrivals_product center">
        <h2 class="arrivals_title">каталог товаров</h2>
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
    </nav>

    <div class="main_content center">
        <div class="products_sort ">

            @forelse($publishedGoods as $publishedGood)
                <div class="featured_link product_link">
                    <div class="block__featured">
                        <div class="block__self1">
                            @if($publishedGood->img)
                                <img src="{{ \Storage::disk('public')->url( $publishedGood->img) }}"
                                     alt="img"
                                     class="photo___1 product__photo"
                                >
                            @else
                                <img src="img/no_photo.jpg"
                                     alt="img"
                                     class="photo___1 product__photo"
                            @endif
                            <a href="{{route('siteOneGood', [
                                                    'id' => $publishedGood->id,
                                                    'tableId' => $publishedGood->table_id,
                                                    'link' => 1,
                                                    'orderId' => 0
                                                    ])}}" class="cart__hover">
                                <img src="{{asset('assets/prod-images/cart_hover.svg')}}"
                                     alt="cart_hover_img"
                                     class="cart_hover_img"
                                >
                                <p class="hover_text">Перейти</p>
                            </a>
                        </div>
                        <p class="featured_text">{{ $publishedGood->name }}</p>
                        <p class="featured_text2">{{ $publishedGood->price }}&#8381;</p>
                    </div>
                </div>

            @empty
                <div class="main_content center"
                     style="width: 1px;height: 120px;">
                    <div>данные отсутствуют</div>
                </div>
            @endforelse

        </div>
    </div>
@endsection
