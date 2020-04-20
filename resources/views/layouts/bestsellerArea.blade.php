<!-- bestseller-area-start -->
<div class="bestseller-area pb-100">
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
                                $bigComic = \App\Http\Controllers\ComicController::getByID(1);
                                $coverBigComic = \App\Http\Controllers\ImageController::getCover($bigComic->id)
                            @endphp
                            <h2><a href="#">{{ $bigComic->comic_name }}</a></h2>
                            <div class="sale-area">
                                <div class="price-box">
                                    @if( $bigComic->max_price != null)
                                        <span class="old-sale">$ {{$bigComic->max_price}}</span>
                                        <span class="new-sale"> {{$bigComic->price}}</span>
                                    @else
                                        <span class="new-sale"> {{$bigComic->price}}</span>
                                    @endif
                                </div>
                            </div>
                            <p>{{ $bigComic->description }}</p>
                        </div>
                        <div class="banner-img-3">
                            <a href="#"><img src="{{asset('img/comicsImages/' . $coverBigComic->image_name) }}" alt="banner" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="bestseller-active owl-carousel">
                    <div class="bestseller-total">
                        <div class="single-bestseller mb-25">
                            <div class="bestseller-img">
                                @php
                                    $number1 = random_int(1, 1); //da fare bene
                                    $comic1 = \App\Http\Controllers\ComicController::getByID($number1);
                                    $cover1 = \App\Http\Controllers\ImageController::getCover($comic1->id);
                                @endphp
                                <a href="#"><img src="{{asset('img/comicsImages/' . $cover1->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                <h3> <a href="#">{{ $comic1->comic_name }}</a></h3>
                                <div class="price">
                                    <ul>
                                        <li><span class="new-price">$ {{ $comic1->price }}</span></li>
                                        <li><span class="old-price">$ {{ $comic1->max_price }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-bestseller">
                            <div class="bestseller-img">
                                @php
                                    $number2 = random_int(1, 1); //da fare bene
                                    $comic2 = \App\Http\Controllers\ComicController::getByID($number2);
                                    $cover2 = \App\Http\Controllers\ImageController::getCover($comic2->id);
                                @endphp
                                <a href="#"><img src="{{asset('img/comicsImages/' . $cover2->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                <h3> <a href="#">{{ $comic2->comic_name }}</a></h3>
                                <div class="price">
                                    <ul>
                                        <li><span class="new-price">$ {{ $comic2->price }}</span></li>
                                        <li><span class="old-price">$ {{ $comic2->max_price }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bestseller-total">
                        <div class="single-bestseller mb-25">
                            <div class="bestseller-img">
                                @php
                                    $number3 = random_int(1, 1); //da fare bene
                                    $comic3 = \App\Http\Controllers\ComicController::getByID($number3);
                                    $cover3 = \App\Http\Controllers\ImageController::getCover($comic3->id);
                                @endphp
                                <a href="#"><img src="{{asset('img/comicsImages/' . $cover3->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                <h3> <a href="#">{{ $comic3->comic_name }}</a></h3>
                                <div class="price">
                                    <ul>
                                        <li><span class="new-price">$ {{ $comic3->price }}</span></li>
                                        <li><span class="old-price">$ {{ $comic3->max_price }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-bestseller">
                            <div class="bestseller-img">
                                @php
                                    $number4 = random_int(1, 1); //da fare bene
                                    $comic4 = \App\Http\Controllers\ComicController::getByID($number4);
                                    $cover4 = \App\Http\Controllers\ImageController::getCover($comic4->id);
                                @endphp
                                <a href="#"><img src="{{asset('img/comicsImages/' . $cover4->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                <h3> <a href="#">{{ $comic4->comic_name }}</a></h3>
                                <div class="price">
                                    <ul>
                                        <li><span class="new-price">$ {{ $comic4->price }}</span></li>
                                        <li><span class="old-price">$ {{ $comic4->max_price }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bestseller-total">
                        <div class="single-bestseller mb-25">
                            <div class="bestseller-img">
                                @php
                                    $number5 = random_int(1, 1); //da fare bene
                                    $comic5 = \App\Http\Controllers\ComicController::getByID($number5);
                                    $cover5 = \App\Http\Controllers\ImageController::getCover($comic5->id);
                                @endphp
                                <a href="#"><img src="{{asset('img/comicsImages/' . $cover5->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                <h3> <a href="#">{{ $comic5->comic_name }}</a></h3>
                                <div class="price">
                                    <ul>
                                        <li><span class="new-price">$ {{ $comic5->price }}</span></li>
                                        <li><span class="old-price">$ {{ $comic5->max_price }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-bestseller">
                            <div class="bestseller-img">
                                @php
                                    $number6 = random_int(1, 1); //da fare bene
                                    $comic6 = \App\Http\Controllers\ComicController::getByID($number6);
                                    $cover6 = \App\Http\Controllers\ImageController::getCover($comic6->id);
                                @endphp
                                <a href="#"><img src="{{asset('img/comicsImages/' . $cover6->image_name) }}" alt="book" /></a>
                            </div>
                            <div class="bestseller-text text-center">
                                <h3> <a href="#">{{ $comic6->comic_name }}</a></h3>
                                <div class="price">
                                    <ul>
                                        <li><span class="new-price">$ {{ $comic6->price }}</span></li>
                                        <li><span class="old-price">$ {{ $comic6->max_price }}</span></li>
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