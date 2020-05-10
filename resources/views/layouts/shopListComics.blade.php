
            <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                <div class="section-title-5 mb-30">
                    <h2>Fumetti</h2>
                </div>
                <div class="toolbar mb-30">
                    <div class="shop-tab">
                        <div class="tab-3">
                            <ul class="nav">
                                <li><a href="#th" data-toggle="tab"><i class="fa fa-th-large"></i>Grid</a></li>
                                <li><a class="active" href="#list" data-toggle="tab"><i class="fa fa-bars"></i>List</a></li>
                            </ul>
                        </div>
                        <div class="list-page">
                            <p>Items {{$comics->firstItem()}}-{{$comics->lastItem()}} of {{$comics->total()}}</p>
                        </div>
                    </div>
                    <form action="{{ url('shoplist') }}" method="GET">
                        <div class="toolbar-sorter">
                            <span>Sort By</span>
                            <select name="sorter" class="sorter-options" style="width:150px;" data-role="sorter">
                                <option selected="selected" value='comic_name_asc'>Titolo: A-Z</option>
                                <option value='comic_name_desc'> Titolo: Z-A</option>
                                <option value='price_asc'> Prezzo: Crescente</option>
                                <option value='price_desc'> Prezzo: Decrescente</option>
                                <option value='created_at'> Ultimi Arrivati</option>
                            </select>
                            <div> <!-- da rendere più bello -->
                                <button type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- tab-area-start -->
                <div class="tab-content">
                    <div class="tab-pane fade" id="th">
                        <div class="row">

                        @foreach($comics as $comic)
                                @php($image = \App\Http\Controllers\ImageController::getCover($comic->id))
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <!-- single-product-start -->
                                <div class="product-wrapper mb-40">
                                    <div class="product-img">
                                        <a href="{{ url('/comic_detail/'.$comic->id) }}">
                                            <img src="{{asset('img/comicsImages/' . $image->image_name) }}" alt="book" class="primary" />
                                        </a>
                                        <div class="quick-view">
                                            <a class="action-view" href="{{ url('/comic_detail/'.$comic->id) }}" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                        <div class="product-flag">
                                            <ul>
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
                                            <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="add-to-link">
                                            <ul>
                                                <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>
                <div class="tab-pane fade show active" id="list">
                    <!-- single-shop-start -->
                    <div class="single-shop mb-30">
                        <div class="row">
                            @foreach($comics->sortBy('sorter') as $comic)
                                @php($image = \App\Http\Controllers\ImageController::getCover($comic->id))

                            <div class="col-lg-3 col-md-4 col-12 mb-25">
                                <div class="product-wrapper-2">
                                    <div class="product-img">
                                        <a href="{{ url('/comic_detail/'.$comic->id) }}">
                                            <img src="{{asset('img/comicsImages/' . $image->image_name) }}" alt="book" class="primary" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="product-wrapper-content">
                                    <div class="product-details">
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
                                        <p>{{$comic->description}}</p>
                                    </div>
                                    <div class="product-link">
                                        <div class="product-button">
                                            <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="add-to-link">
                                            <ul>
                                                <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                </div>