<!-- bestseller-area-start -->
<div class="bestseller-area pb-25">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="deal-active owl-carousel">
                    <div class="single-deal">
                        <div class="deal-off-day">
                            <div class="deal-off-day-title">
                                <h1>DGDeals</h1>
                            </div>
                            @php

                                    $bigComic = \App\Http\Controllers\ComicController::getComicByDiscount();
                                    $coverBigComic = \App\Http\Controllers\ImageController::getCover($bigComic->id)
                            @endphp
                                <h2>{{ $bigComic->comic_name }} </h2>
                            <div class="sale-area">
                                <div class="price-box">
                                    @if( $bigComic->discount != 0)
                                        @php
                                            $valoreSconto = (($bigComic->price * $bigComic->discount) / 100);
                                            $fullPrice = ($bigComic->price - $valoreSconto);
                                            $newPrice = round($fullPrice,2);
                                        @endphp
                                        <span class="old-sale">€{{$bigComic->price}}</span>
                                        <span class="new-sale">€{{$newPrice}}</span>
                                    @else
                                        <span class="new-sale">€{{$bigComic->price}}</span>
                                    @endif
                                </div>
                            </div>
                            <p>{{ $bigComic->description }}</p>
                        </div>
                        <div class="banner-img-3">
                            <a class="action-view" href="{{ url('/comic_detail/'.$bigComic->id) }}"><img src="{{asset('img/comicsImages/' . $coverBigComic->image_name) }}" alt="banner" /></a>
                            <!-- ho provato a mettere la lente d'ingrandimento come in featured ma niente :P-->
                            <!-- ho rimesso come di default, ma credetmi, ho provato, se volete provate anche voi-->
                            <!-- ovviamente questo vale anche per i più piccolini di quest'area :P -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="bestseller-active owl-carousel">
                    <div class="bestseller-total">
                        <div class="single-bestseller mb-25">
                            <div class="bestseller-img">
                                @php($comic1 = \App\Http\Controllers\ComicController::getComicByDiscountAndNumber(1))
                                @php($cover1 = \App\Http\Controllers\ImageController::getCover($comic1->id))
                                <a href="{{ url('/comic_detail/'.$comic1->id) }}"><img src="{{asset('img/comicsImages/' . $cover1->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                    <h3>{{ $comic1->comic_name }} </h3>
                                <div class="price">
                                    <ul>
                                        @if( $comic1->discount != 0)
                                            @php($newPrice1 = \App\Http\Controllers\ComicController::priceCalculator($comic1->id))
                                            <li><span class="new-price">€ {{ $newPrice1 }}</span></li>
                                            <li><span class="old-price">€ {{ $comic1->price }}</span></li>
                                        @else
                                            <li><span class="new-price">€ {{ $comic1->price }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-bestseller">
                            <div class="bestseller-img">
                                @php($comic2 = \App\Http\Controllers\ComicController::getComicByDiscountAndNumber(2))
                                @php($cover2 = \App\Http\Controllers\ImageController::getCover($comic2->id))
                                <a href="{{ url('/comic_detail/'.$comic2->id) }}"><img src="{{asset('img/comicsImages/' . $cover2->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                    <h3>{{ $comic2->comic_name }} </h3>
                                <div class="price">
                                    <ul>
                                        @if( $comic2->discount != 0)
                                            @php($newPrice2 = \App\Http\Controllers\ComicController::priceCalculator($comic2->id))
                                            <li><span class="new-price">€ {{ $newPrice2 }}</span></li>
                                            <li><span class="old-price">€ {{ $comic2->price }}</span></li>
                                        @else
                                            <li><span class="new-price">€ {{ $comic2->price }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bestseller-total">
                        <div class="single-bestseller mb-25">
                            <div class="bestseller-img">
                                @php($comic3 = \App\Http\Controllers\ComicController::getComicByDiscountAndNumber(3))
                                @php($cover3 = \App\Http\Controllers\ImageController::getCover($comic3->id))
                                <a href="{{ url('/comic_detail/'.$comic3->id) }}"><img src="{{asset('img/comicsImages/' . $cover3->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                    <h3>{{ $comic3->comic_name }} </h3>
                                <div class="price">
                                    <ul>
                                        @if( $comic3->discount != 0)
                                            @php($newPrice3 = \App\Http\Controllers\ComicController::priceCalculator($comic3->id))
                                            <li><span class="new-price">€ {{ $newPrice3 }}</span></li>
                                            <li><span class="old-price">€ {{ $comic3->price }}</span></li>
                                        @else
                                            <li><span class="new-price">€ {{ $comic3->price }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-bestseller">
                            <div class="bestseller-img">
                                @php($comic4 = \App\Http\Controllers\ComicController::getComicByDiscountAndNumber(4))
                                @php($cover4 = \App\Http\Controllers\ImageController::getCover($comic4->id))
                                <a href="{{ url('/comic_detail/'.$comic4->id) }}"><img src="{{asset('img/comicsImages/' . $cover4->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                    <h3>{{ $comic4->comic_name }} </h3>
                                <div class="price">
                                    <ul>
                                        @if( $comic4->discount != 0)
                                            @php($newPrice4 = \App\Http\Controllers\ComicController::priceCalculator($comic4->id))
                                            <li><span class="new-price">€ {{ $newPrice4 }}</span></li>
                                            <li><span class="old-price">€ {{ $comic4->price }}</span></li>
                                        @else
                                            <li><span class="new-price">€ {{ $comic4->price }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bestseller-total">
                        <div class="single-bestseller mb-25">
                            <div class="bestseller-img">
                                @php($comic5 = \App\Http\Controllers\ComicController::getComicByDiscountAndNumber(5))
                                @php($cover5 = \App\Http\Controllers\ImageController::getCover($comic5->id))
                                <a href="{{ url('/comic_detail/'.$comic5->id) }}"><img src="{{asset('img/comicsImages/' . $cover5->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                    <h3>{{ $comic5->comic_name }} </h3>
                                <div class="price">
                                    <ul>
                                        @if( $comic5->discount != 0)
                                            @php($newPrice5 = \App\Http\Controllers\ComicController::priceCalculator($comic5->id))
                                            <li><span class="new-price">€ {{ $newPrice5 }}</span></li>
                                            <li><span class="old-price">€ {{ $comic5->price }}</span></li>
                                        @else
                                            <li><span class="new-price">€ {{ $comic5->price }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-bestseller">
                            <div class="bestseller-img">
                                    @php($comic6 = \App\Http\Controllers\ComicController::getComicByDiscountAndNumber(6))
                                    @php($cover6 = \App\Http\Controllers\ImageController::getCover($comic6->id))
                                <a href="{{ url('/comic_detail/'.$comic6->id) }}"><img src="{{asset('img/comicsImages/' . $cover6->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                    <h3>{{ $comic6->comic_name }} </h3>
                                <div class="price">
                                    <ul>
                                        @if( $comic6->discount != 0)
                                            @php($newPrice6 = \App\Http\Controllers\ComicController::priceCalculator($comic6->id))
                                            <li><span class="new-price">€ {{ $newPrice6 }}</span></li>
                                            <li><span class="old-price">€ {{ $comic6->price }}</span></li>
                                        @else
                                            <li><span class="new-price">€ {{ $comic6->price }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bestseller-area-end -->