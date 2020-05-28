
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
                    <form method="GET">
                        <div class="toolbar-sorter">
                            <select name="sorter" class="sorter-options" data-role="sorter">
                                <option value='comic_name_asc'>Titolo: A-Z</option>
                                <option value='comic_name_desc'> Titolo: Z-A</option>
                                <option value='price_asc'> Prezzo: Crescente</option>
                                <option value='price_desc'> Prezzo: Decrescente</option>
                                <option value='created_at'> Ultimi Arrivati</option>
                            </select>
                         <button class="btn btn-sqr" type="submit" >Ordina </button><!-- da rendere più bello -->
                            <div>
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
                                                    <li><span class="discount-percentage">-{{ $comic->discount }}%</span></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-details text-center">
                                        <div class="product-rating">
                                            <ul>
                                                @php($id = $comic->id)
                                                @php($avgstar = \App\Review::where('comic_id','=',$id)->avg('stars'))
                                                @foreach(range(1,5) as $i)
                                                    @if($avgstar >0)
                                                        @if($avgstar >0.5)
                                                            <a href="#void"><i class="fa fa-star"></i></a>
                                                        @else
                                                            <a  href="#void"><i class="fa fa-star-half-o"></i></a>
                                                        @endif
                                                    @else
                                                        <a href="#void"><i class="fa  fa-star-o"></i></a>
                                                    @endif
                                                    <?php $avgstar--; ?>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <h4>{{ $comic->comic_name }}</h4>
                                        <div class="product-price">
                                            <ul>
                                                @if( $comic->discount != 0 )
                                                    @php($newPrice = \App\Http\Controllers\ComicController::priceCalculator($comic->id))
                                                    <li>€ {{ $newPrice}}</li>
                                                    <li class="old-price">€{{ $comic->price }}</li>
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
                                            </ul>
                                        </div>
                                        <h4>{{ $comic->comic_name }}</h4>
                                        <div class="product-price">
                                            <ul>
                                                @if( $comic->discount != 0 )
                                                    @php($newPrice = \App\Http\Controllers\ComicController::priceCalculator($comic->id))
                                                    <li>€ {{ $newPrice}}</li>
                                                    <li class="old-price">€{{ $comic->price }}</li>
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