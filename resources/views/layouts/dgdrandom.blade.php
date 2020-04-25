<!-- featured-area-start -->
<div class="new-book-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title section-title-res text-center mb-30">
                    <h2>DGDRandom</h2>
                    <h6>Scelti a caso per voi</h6>
                </div>
            </div>
        </div>
        <div class="tab-active owl-carousel">
            @foreach($comics->shuffle()->take(10) as $comic)
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
                                        @php($valoreSconto = (($comic->price * $comic->discount) / 100))
                                        @php($newPrice = ($comic->price - $valoreSconto))
                                        <li><span class="discount-percentage">-{{ $comic->discount }}%</span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="product-details text-center">
                            <div class="product-rating">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h4>{{ $comic->comic_name }}</h4>
                            <div class="product-price">
                                <ul>

                                    @if( $comic->discount != 0 )
                                        @php($valoreSconto = (($comic->price * $comic->discount) / 100))
                                        @php($newPrice = ($comic->price - $valoreSconto))
                                        <li>€ {{ $newPrice}}</li>
                                    @else
                                        <li>€ {{ $comic->price }}</li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</a>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- featured-area-end -->