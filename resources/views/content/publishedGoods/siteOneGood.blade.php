@extends('layouts.prod')
@section('content')

    <nav class="arrivals_product center">
        <h2 class="arrivals_title">{{$publishedGood->name}}</h2>
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
    </nav>

    <div class="women">
        <div class="women_main_content">
            <div class="women_slider_element">
                <i class="fas fa-chevron-left slider_arrow fa-chevron-left-women">
                </i>
            </div>
            @if($publishedGood->img)
                <img src="{{ \Storage::disk('public')->url( $publishedGood->img) }}" alt="avatar"
                     class="women_main_img" style="width: 413px;">
            @else
                <img src="/img/no_photo.jpg" alt="avatar" class="women_main_img">
            @endif
            <div class="women_slider_element">
                <i class="fas fa-chevron-right slider_arrow fa-chevron-right-women">
                </i>
            </div>
        </div>
        <div class="position__women_blocks"></div>
        <div class="women__collection">
            <article class="top__block">
                <div class="w__top_text_and_bottom">
                    <div class="w__collection">BEST COLLECTION</div>
                    <div class="bottom__w"></div>
                    <div class="bottom__w2"></div>
                </div>
                <h2 class="w__text_moshino">{{ $publishedGood->name }}</h2>
                <p class="w__text">{{ $publishedGood->info }}</p>
                <div class="material_and_designer">
                    <div class="w__left_block">
                        <span class="w__material">БРЕНД:</span>
                        <span class="w__design">{{ $publishedGood->brand }}</span>
                    </div>
                    <div class="w__right_block">
                        <span class="w__material">ДИЗАЙНЕР:</span>
                        <span class="w__design">{{ $publishedGood->designer }}</span>
                    </div>
                </div>
                <p class="w__price">{{ $publishedGood->price }}&#8381;</p>
            </article>
            <div class="bottom__block">
                <div class="summares_bottom__block" style="display:flex; justify-content: space-around">
                    <div class="choose__size_subblock">
                        <h3 class="summares__titles">РАЗМЕР</h3>
                        <div class="choose__size_summary_drop">{{ $publishedGood->size }}</div>
                    </div>
                    <div class="choose__size_subblock">
                        <h3 class="summares__titles">ПОЛ</h3>
                        <div class="choose__size_summary_drop">{{ $publishedGood->sex }}</div>
                    </div>
                    <div class="quanity__subblock">
                        <h3 class="summares__titles">КОЛИЧЕСТВО</h3>
                        <div class="choose__size_summary_drop">{{ $count }}шт.</div>
                    </div>
                </div>
                <div style="display: flex; justify-content: space-around">
                    <a class="add__bottom_cart"
                       href="{{route('backForSite', ['link' => $link, 'orderId' => $orderId])}}">
                        <i class="fa fa-arrow-left cart__bottom"></i>
                        Назад
                    </a>
                    @if(Auth::check())
                        <a class="add__bottom_cart"
                           href="{{route('addToBasket', [
                                    'id' => $publishedGood->id,
                                    'tableId' => $publishedGood->table_id,
                                    'link' => 1
                                    ])}}">
                            <i class="fas fa-shopping-cart cart__bottom"></i>
                            Добавить в корзину
                        </a>
                        <a class="add__bottom_cart"
                           href="{{route('delFromBasket', [
                                    'id' => $publishedGood->id,
                                    'tableId' => $publishedGood->table_id,
                                    'link' => 1
                                    ])}}">
                            <i class="fa fa-window-close cart__bottom"></i>
                            Убрать из корзины
                        </a>
                    @else
                        <a class="add__bottom_cart"
                           href="{{route('addToBasket', [
                                    'id' => $publishedGood->id,
                                    'tableId' => $publishedGood->table_id,
                                    'link' => 1
                                    ])}}">
                            <i class="fa fa-user-circle cart__bottom"></i>
                            Авторизуйтесь чтобы купить
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="women__space"></div>

@endsection
