@extends('layouts.prod')
@section('content')

        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif

        <div class="promo center">
            <section class="promo__content">
                <h2 class="promo__h2 line__hight_drand">THE BRAND</h2>
                <h3 class="promo__h3">OF LUXERIOUS <span class="promo__color">FASHION</span></h3>
            </section>
        </div>
        <div class="blocks_img center">
            <div class="block__img1 block__img_trans">
                <article class="text__block1 block__text_transform">
                    <p class="title_block_img">HOT DEAL</p>
                    <h3 class="title_block_img2">FOR MEN</h3>
                </article>
            </div>
            <div class="block__img3 block__img_trans">
                <article class="text__block3 block__text_transform">
                    <p class="title_block_img">LUXIROS & TRENDY</p>
                    <h3 class="title_block_img2">ACCESORIES</h3>
                </article>
            </div>
            <div class="block__img2 block__img_trans">
                <article class="text__block2 block__text_transform">
                    <p class="title_block_img">30% OFFER</p>
                    <h3 class="title_block_img2">WOMEN</h3>
                </article>
            </div>
            <div class="block__img4 block__img_trans">
                <article class="text__block4 block__text_transform">
                    <p class="title_block_img">NEW ARRIVALS</p>
                    <h3 class="title_block_img2">FOR KIDS</h3>
                </article>
            </div>
        </div>
        <div class="clr"></div>
        <aside class="offer_block">
            <div class="left_block_offer">
                <div class="offer_text_box">
                    <h1 class="offer_title">30% <span class="special_color_offer">offer</span></h1>
                    <p class="offer_text">for women</p>
                </div>
            </div>
            <div class="right_block_offer">
                <div class="right__subblock_offer">
                    <img src="{{asset('assets/prod-images/forma_car.png')}}" alt="forma_car" class="forma_car">
                    <div class="offer_text_right">
                        <div class="offer_paragraph1">Free Delivery</div>
                        <div class="offer_paragraph2">Worldwide delivery on&nbsp;all. Authorit tively morph
                            next-generation
                            innov tion with extensive models.
                        </div>
                    </div>
                </div>
                <div class="right__subblock_offer">
                    <img
                        src="{{asset('assets/prod-images/forma_sale.png')}}" alt="forma_sale" class="forma_sale">
                    <div class="offer_text_right">
                        <div class="offer_paragraph1">Sales&nbsp;&&nbsp;discounts</div>
                        <div class="offer_paragraph2">Worldwide delivery on&nbsp;all. Authorit tively morph
                            next-generation
                            innov tion with extensive models.
                        </div>
                    </div>
                </div>
                <div class="right__subblock_offer">
                    <img src="{{asset('assets/prod-images/forma_king.png')}}" alt="forma_king" class="forma_king">
                    <div class="offer_text_right">
                        <div class="offer_paragraph1">Quality&nbsp;assurance</div>
                        <div class="offer_paragraph2">Worldwide delivery on&nbsp;all. Authorit tively morph
                            next-generation
                            innov tion with extensive models.
                        </div>
                    </div>
                </div>
            </div>
        </aside>

    </div>

@endsection
