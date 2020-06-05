<div class="section-title bt text-center pt-100 mb-30 section-title-res">
    <h1>{{$user->name}} {{$user->surname}}</h1>
</div>

<center>Media delle Recesioni  : @foreach(range(1,5) as $i)
        @if($ranking->avg_stars >0)
            @if($ranking->avg_stars >0.5)
                <a><i class="fa fa-star fa_custom"></i></a>
            @else
                <a><i class="fa fa-star-half-o fa_custom"></i></a>
            @endif
        @else
            <a><i class="fa  fa-star-o fa_custom"></i></a>
        @endif
        <?php $ranking->avg_stars--; ?>
    @endforeach</center>
<br>
<center>Totale Recensioni: {{$ranking->feedback_number}}</center>
<br>
<center>Totale Prodotti Venduti : {{$ranking->number_selling_products}}</center>
<br>


<!-- new-book-area-start -->
<div class="new-book-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title bt text-center pt-100 mb-30 section-title-res">
                    <h2>I miei Prodotti</h2>
                </div>
            </div>
        </div>
        <div class="tab-active owl-carousel">
        @foreach($comics as $comic)
            <!-- single-product-start -->
                <div class="product-wrapper">
                    <div class="product-img">
                        @php($image = \App\Http\Controllers\ImageController::getCover($comic->id))
                        <a href="{{ url('/comic_detail/'.$comic->id) }}">
                            <img src="{{asset('img/comicsImages/' . $image->image_name) }}" alt="book" class="primary" />
                        </a>
                        <div class="quick-view">
                            <a class="action-view" href="{{ url('/comic_detail/'.$comic->id) }}">
                                <i class="fa fa-search-plus"></i>
                            </a>
                        </div>
                        <div class="product-flag">
                            <ul>
                                @if( $comic->discount != 0 )
                                    <li><span class="discount-percentage">-{{ $comic->discount }}%</span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="product-details text-center">
                        <div class="product-rating">
                            @php($id = $comic->id)
                            @php($avgstar = \App\Review::where('comic_id','=',$id)->avg('stars'))
                            @foreach(range(1,5) as $i)
                                @if($avgstar >0)
                                    @if($avgstar >0.5)
                                        <a><i class="fa fa-star fa_custom"></i></a>
                                    @else
                                        <a><i class="fa fa-star-half-o fa_custom"></i></a>
                                    @endif
                                @else
                                    <a><i class="fa  fa-star-o fa_custom"></i></a>
                                @endif
                                <?php $avgstar--; ?>
                            @endforeach
                        </div>
                        <h4>{{ $comic->comic_name }}</h4>
                        <div class="product-price">
                            <ul>
                                @if( $comic->discount != 0 )
                                    @php($newPrice = \App\Http\Controllers\ComicController::priceCalculator($comic->id))
                                    <li>€ {{ $newPrice}}</li>
                                @else
                                    <li>€ {{ $comic->price }}</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="product-link">
                        @if(\Illuminate\Support\Facades\Auth::user() != null)
                            <div class="product-button">
                                <a href="{{url('add-to-cart-case-1/'.$comic->id) }}" title="Add to cart"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</a>
                            </div>
                        @else
                            <div class="product-button">
                                <a href="{{url('/login') }}" title="Add to cart"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</a>
                            </div>
                        @endif
                    </div>
                </div>
        @endforeach
        <!-- single-product-end -->
        </div>
    </div>
</div>