<!-- QUEST'AREA NON L'HO COMPLETATA A DIFFERENZA DI BESTSELLER PERCHE' MENTRE LI METTIAMO COMICS RANDOM, QUNDI AVEVA UN SENSO, QUI NE METTIAMO SPECIFICI, E NON ESSENDO LE QUERY ANCORA IMPLEMENTATE SAREBBE SOLO LAVORO INUTILE ORA COME ORA -->
<!-- product-area-start -->
<div class="product-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title bt text-center pt-100 mb-50">
                    <h2>I nostri prodotti</h2>
                    <p>Cerca nella nostra collezione i nostri prodotti più venduti ed interessanti. <br /> Troverai sicuramente ciò che cerchi!.</p>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- tab-menu-start -->
                <div class="tab-menu mb-40 text-center">
                    <ul class="nav justify-content-center">
                        <li><a class="active" href="#manga" data-toggle="tab">Manga</a></li>
                        <li><a href="#americanComics" data-toggle="tab">Fumetti americani</a></li>
                        <li><a href="#italian" data-toggle="tab">Fumetti italiani</a></li>
                    </ul>
                </div>
                <!-- tab-menu-end -->
            </div>
        </div>
        <!-- tab-area-start -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="manga">
                <div class="tab-active owl-carousel">
                    <!-- single-product-start -->
                    @foreach($newComics as $comic)
                        @php($image = \App\Http\Controllers\ImageController::getCover($comic->id))

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
                                    <h4><a href="#">{{ $comic->comic_name }}</a></h4>
                                    <div class="product-price">
                                        <ul> <!-- commento a caso per problema push con git-->
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
                @endforeach
                    <!-- single-product-end -->
                 </div>
            </div>
            <div class="tab-pane fade" id="americanComics">
                <div class="tab-active owl-carousel">
                    <!-- single-product-start -->
                @foreach($newComics as $comic)
                    @php($image = \App\Http\Controllers\ImageController::getCover($comic->id))

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
                                <h4><a href="#">{{ $comic->comic_name }}</a></h4>
                                <div class="product-price">
                                    <ul> <!-- commento a caso per problema push con git-->
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
                @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="italian">
                <div class="tab-active owl-carousel">
                    <!-- single-product-start -->
                @foreach($newComics as $comic)
                    @php($image = \App\Http\Controllers\ImageController::getCover($comic->id))

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
                                <h4><a href="#">{{ $comic->comic_name }}</a></h4>
                                <div class="product-price">
                                    <ul> <!-- commento a caso per problema push con git-->
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
                @endforeach
               
                </div>
            </div>
        </div>
        <!-- tab-area-end -->
    </div>
</div>
<!-- product-area-end -->