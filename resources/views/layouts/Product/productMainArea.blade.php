<!-- product-main-area-start -->
<div class="product-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-12 order-lg-1 order-1">
                <!-- product-main-area-start -->
                <div class="product-main-area">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="flexslider">

                                @php($cover = \App\Http\Controllers\ImageController::getCover($comic->id))
                                @php($images = \App\Http\Controllers\ImageController::getOtherImagesOrdered($comic->id))

                                <ul class="slides">
                                    <li data-thumb="{{asset('img/comicsImages/' . $cover->image_name) }}">
                                        <img src="{{asset('img/comicsImages/' . $cover->image_name) }}" alt="{{ $comic->comic_name }}" />
                                    </li>
                                    @foreach($images as $image)
                                    <li data-thumb="{{ asset('img/comicsImages/' . $image->image_name) }}">
                                        <img src="{{ asset('img/comicsImages/' . $image->image_name) }}" alt="{{ $comic->comic_name }}" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="product-info-main">
                                <div class="page-title">
                                        <h1>{{ $comic->comic_name }} </h1>
                                </div>
                                <div class="product-info-stock-sku">
                                    @if($comic->quantity > 0)
                                        <span>Disponibile</span>
                                    @elseif($comic->quantity <= 0)
                                        <span>Non disponibile</span>
                                    @endif
                                </div>
                                <br/>
                                <div class="mb-2"></div>
                                <div class="row">
                                    <div class="col-sm-2 product-info-stock-sku">
                                        <Span>Venditore</Span>
                                    </div>
                                    <div class=" col-sm-10 product-attribute">
                                        @php($seller = \App\Http\Controllers\ComicController::getSeller($comic->id))
                                        <a href="{{url('vendor_detail/'.$seller->id) }}">{{ $seller->username }}</a> <!-- Display seller of the comic -->
                                    </div>
                                </div>
                                <div class="product-attribute">
                                    <p>{{$comic->publisher}}</p> <!-- Display publisher of the comic -->
                                </div>
                                <div class="product-info-genre">

                                    <div class="product-attribute">
                                        <p>
                                            @foreach($comic->genre as $genres)
                                                <a href="{{route('genreshoplist',['name_genre' => $genres->name_genre])}}">{{$genres->name_genre }}</a> <!-- Display genre of the comic -->
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="rating-summary">
                                    @php($id = $comic->id)
                                    @php($avgstar = \App\Review::where('comic_id','=',$id)->avg('stars'))
                                    @foreach(range(1,5) as $i)
                                        @if($avgstar >0)
                                            @if($avgstar >0.5)
                                                <a><i class="fa fa-star fa_custom" style="color: #eeb900;"></i></a>
                                            @else
                                                <a><i class="fa fa-star-half-o fa_custom" style="color: #eeb900;"></i></a>
                                            @endif
                                        @else
                                            <a><i class="fa  fa-star-o fa_custom" style="color: #eeb900;"></i></a>
                                        @endif
                                        <?php $avgstar--; ?>
                                    @endforeach
                                </div>
                                <div class="reviews-actions">
                                @php($numberR = $reviews->count())
                                    <a>{{$numberR}} Recensioni</a>
                                </div>
                            </div>
                            <br/>
                            <div class="product-info-price">
                                <div class="price-final">
                                    @if( $comic->discount != 0 )
                                           @php($newPrice = \App\Http\Controllers\ComicController::priceCalculator($comic->id))
                                        <span>€{{ $newPrice }}</span> <!-- Price Done -->
                                        <span class="old-price">€{{$comic->price}}</span> <!--Old price !! -->
                                    @else
                                        <span>€{{$comic->price}}</span> <!--Old price !! -->
                                    @endif
                                </div>
                            </div>
                            <div class="product-add-form">
                                @if($comic->quantity>0 && \Illuminate\Support\Facades\Auth::user()!=null)
                                    @if(!Auth::user()->hasGroup('il gruppo degli admin'))
                                        <form action="{{url('add-to-cart/'.$comic->id) }}">
                                            <div class="quality-button">
                                                <input name="qty" id="qty" class="qty" type="number" min="1" max="{{$comic->quantity}}" value="1">
                                            </div>
                                            <button type="submit" class="quality-button">Aggiungi al carrello</button>
                                        </form>
                                    @endif
                                @elseif($comic->quantity>0)
                                    <form action="{{url('/login') }}">
                                        <div class="quality-button">
                                            <input name="qty" id="qty" class="qty" type="number" min="1" max="{{$comic->quantity}}" value="1">
                                        </div>
                                        <button type="submit" class="quality-button">Aggiungi al carrello</button>
                                    </form>
                                @endif
                            </div>
                            <div class="product-social-links">
                                @if(\Illuminate\Support\Facades\Auth::user() != null)
                                    @if(!Auth::user()->hasGroup('il gruppo degli admin'))
                                        <div class="product-addto-links">
                                            <div class="row">
                                                <div class="ml-3"></div>
                                                <a href="{{url('add-to-list/'.$comic->id) }}"><i class="fa fa-heart"></i></a>
                                                <h5 style="font-size: 17px; margin-top: 2%;">aggiungilo nella tua personale lista dei desideri!</h5>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="product-addto-links">
                                        <div class="row">
                                            <div class="ml-3"></div>
                                            <a href="{{url('/login') }}"><i class="fa fa-heart"></i></a>
                                            <h5 style="font-size: 17px; margin-top: 2%;">aggiungilo nella tua personale lista dei desideri!</h5>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="product-addto-links-text">
                                {!! $comic->description !!}
                            </div>
                            <div class="tab-content border-0">
                                <div class="tab-pane fade show active" id="Details">
                                    <div class="valu">
                                        <ul>
                                            <li><i class="fa fa-circle"></i>ISBN: {{ $comic->ISBN }}</li>
                                            <li><i class="fa fa-circle"></i>Adjustable shoulder strap.</li> <!-- i model e l'ER mi sembra non siano aggiornati, da completare-->
                                            <li><i class="fa fa-circle"></i>Full-length zipper.</li>
                                            @if($comic->length != null)
                                                <li><i class="fa fa-circle"></i>L {{$comic->length}} cm x W {{$comic->width}} cm x H {{$comic->height}} cm.</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.Product.relatedProduct')
        </div>
    <!-- product-main-area-end -->
    </div>
</div>