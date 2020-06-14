<!-- featured-area-start -->
<div class="new-book-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title section-title-res text-center mb-30">
                    <h2>Pubblicati di recente</h2>
                </div>
            </div>
        </div>
        <div class="tab-active owl-carousel">
            @foreach($newComics as $comic)
                @php($image = \App\Http\Controllers\ImageController::getCover($comic->id))
                <div class="tab-total">
                    <!-- single-product-start -->
                    <div class="product-wrapper">
                        <div class="product-img">
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
                                    <!-- <li><span class="sale">new</span> <br></li>  ESSENDOCI UNA PARTE NEW ARRIVAL MI SEMBRA INUTILE METTERE L'ETICHETTA NEW...-->
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
                                <ul> <!-- commento a caso per problema push con git-->
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
                                @if(!Auth::user()->hasGroup('il gruppo degli admin'))
                                    <div class="product-button">
                                        <a href="{{url('add-to-cart-case-1/'.$comic->id) }}" title="Add to cart"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</a>
                                    </div>
                                @endif
                            @else
                                <div class="product-button">
                                    <a href="{{url('/login') }}" title="Add to cart"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- single-product-end -->
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- featured-area-end -->