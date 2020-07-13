<!-- new-book-area-start -->
<div class="new-book-area pb-50">
    <div class="container">
        <div class="row">
            <div class="section-title mb-30 section-title-res">
                <h1>{{$user->username}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2"></div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <h5>Informazioni</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <b>Nome e cognome:</b>
                    </div>
                    <div class="col-lg-7-5">
                        {{$user->name}} {{$user->surname}}
                    </div>
                </div>
                <div class="mt-1"></div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <b>Nome attività:</b>
                    </div>
                    <div class="col-lg-7-5">
                        {{$user->attivita}}
                    </div>
                </div>
                <div class="mt-1"></div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <b>Numero partita iva:</b>
                    </div>
                    <div class="col-lg-7-5">
                        {{$user->partitaIva}}
                    </div>
                </div>
                <div class="mt-1"></div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <b>Indirizzo e-mail:</b>
                    </div>
                    <div class="col-lg-7-5">
                        {{$user->email}}
                    </div>
                </div>
                <div class="mt-1"></div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <b>Recapito telefonico:</b>
                    </div>
                    <div class="col-lg-7-5">
                        {{$user->phone_number}}
                    </div>
                </div>
                <div class="mt-2"></div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <h5>Sede aziendale</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7-5">
                        {{$sede->via}} {{$sede->civico}}
                        <br/>
                        {{$sede->città}}, {{$sede->post_code}}
                        @if($sede->other_info != "")
                            <br/>
                            {{$sede->other_info}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2"></div>
            <div class="row">
                <div class="col-lg-3-5">
                    <h5>Statistiche</h5>
                </div>
            </div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <b>Media recesioni:</b>
                    </div>
                    <div class="col-lg-7-5">
                        @foreach(range(1,5) as $i)
                            @if($ranking->avg_stars >0)
                                @if($ranking->avg_stars >0.5)
                                    <a><i class="fa fa-star fa_custom" style="color: #eeb900;"></i></a>
                                @else
                                    <a><i class="fa fa-star-half-o fa_custom" style="color: #eeb900;"></i></a>
                                @endif
                            @else
                                <a><i class="fa  fa-star-o fa_custom" style="color: #eeb900;"></i></a>
                            @endif
                            <?php $ranking->avg_stars--; ?>
                        @endforeach
                    </div>
                </div>
                <div class="mt-1"></div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <b>Totale recensioni:</b>
                    </div>
                    <div class="col-lg-7-5">
                        {{$ranking->feedback_number}}
                    </div>
                </div>
                <div class="mt-1"></div>
                <div class="row">
                    <div class="col-lg-3-5">
                        <b>Prodotti venduti:</b>
                    </div>
                    <div class="col-lg-7-5">
                        {{$ranking->number_selling_products}}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title bt text-center pt-50 mb-30 section-title-res">
                    <h2>I miei Prodotti</h2>
                </div>
            </div>
        </div>
        <div class="tab-active owl-carousel bb" style="padding-bottom: 5%;">
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
                        @if(strlen($comic->comic_name) < 17 )
                            <div style="font-family: 'Open Sans', sans-serif; font-size: 20px; margin-top: 1%; color: #333;"><b>{{ $comic->comic_name }}</b></div>
                        @else
                            @php($subcomic = substr($comic->comic_name, 0, 17))
                            <div style="font-family: 'Open Sans', sans-serif; font-size: 20px; margin-top: 1%; color: #333;"><b>{{ $subcomic }}</b></div>
                        @endif
                        <div class="product-rating">
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
        <div class="mt-3"></div>
    </div>
</div>



            <div class="section-title text-center pt-50 mb-30 section-title-res">
                <h2>Recensioni</h2>
            </div>



<div class="my-account-wrapper mb-70">
    <div class="container">
        <div class="section-bg-color">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#ReviewRicevute" class="active" data-toggle="tab"><i class="fa fa-comment-o"></i>Recensioni Ricevute</a>
                                    <a href="#ReviewScritte" data-toggle="tab"><i class="fa fa-commenting-o"></i>Recensioni scritte</a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="tab-content" id="MyAccountContent">
                                    <div class="tab-pane fade show  active" id="ReviewRicevute" role="tabpanel">
                                        <div class="product-info-area" style="margin-left: 5%">
                                            <div class="tab-pane fade show active"  id="review">
                                                <div class="valu">
                                                    <div class="row">
                                                        <div class="ml-3"></div>
                                                        <div class="col-lg-6">
                                                            @php($reviews=\App\Http\Controllers\ReviewController::getAllRecievedReview($user->id))
                                                            @if($reviews->count() <= 0)
                                                                <h3>Non ci sono Recensioni</h3>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @foreach($reviews as $review)
                                                        @php($comicOfReviewVendorDetail = \App\Http\Controllers\ComicController::getByID($review->comic_id))
                                                        <div class="row" style="border-bottom: lightgray 1px solid; padding-bottom: 5%">
                                                            <div class="ml-5"></div>
                                                            <div class="col-lg-10">
                                                                <h4> Fumetto: {{$comicOfReviewVendorDetail->comic_name}}</h4>
                                                                <h5>{{$review->review_title}}</h5>
                                                                <div class="review-rating">
                                                                    <div class="rating-result">
                                                                        @php($stars = $review->stars)
                                                                        @foreach(range(1,5) as $i)
                                                                            @if($stars >0)
                                                                                @if($stars >0.5)
                                                                                    <a><i class="fa fa-star fa_custom" style="color: #eeb900;"></i></a>
                                                                                @else
                                                                                    <a><i class="fa fa-star-half-o fa_custom" style="color: #eeb900;"></i></a>
                                                                                @endif
                                                                            @else
                                                                                <a><i class="fa  fa-star-o fa_custom" style="color: #eeb900;"></i></a>
                                                                            @endif
                                                                            <?php $stars--; ?>
                                                                        @endforeach
                                                                    </div>
                                                                    <br>
                                                                    <div class="review-details">
                                                                        <p> {!! $review->review_text !!}</p>
                                                                        <br>
                                                                        @php($userR = \App\Http\Controllers\UserController::getUserId($review->user_id))
                                                                        @php($username = $userR->username)
                                                                        <p style="font-size: 13px; margin: 0;">Review by {{$username}}</p>
                                                                        <p style="font-size: 10px; margin: 0;">Posted on {{\Carbon\Carbon::parse($review->review_date)->format('d/m/Y')}} </p>
                                                                        @if(Auth::user())
                                                                            @if(Auth::user()->hasGroup('il gruppo degli admin'))
                                                                                <div style="font-size: 24px;">
                                                                                    <a class="btn btn-danger" onclick="return myFunction();"  href="{{route('review-delete-local', $review->id)}}"><i class="fa fa-trash" ></i></a>
                                                                                    <script>
                                                                                        function myFunction() {
                                                                                            if(!confirm("Sei sicuro di voler eliminare questa recensione"))
                                                                                                event.preventDefault();
                                                                                            else{

                                                                                            }

                                                                                        }
                                                                                    </script>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-5"></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show " id="ReviewScritte" role="tabpanel">
                                        <div class="product-info-area" style="margin-left: 5%">
                                            <div class="tab-pane fade show active"  id="review">
                                                <div class="valu">
                                                    <div class="row">
                                                        <div class="ml-3"></div>
                                                        <div class="col-lg-6">
                                                            @php($reviews=\App\Http\Controllers\ReviewController::getAllWritedReview($user->id))
                                                            @if($reviews->count() <= 0)
                                                                <h3>Non ci sono Recensioni</h3>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @foreach($reviews as $review)
                                                        @php($comicOfReviewVendorDetail = \App\Http\Controllers\ComicController::getByID($review->comic_id))
                                                        <div class="row" style="border-bottom: lightgray 1px solid; padding-bottom: 5%">
                                                            <div class="ml-5"></div>
                                                            <div class="col-lg-10">
                                                                <h4> Fumetto: {{$comicOfReviewVendorDetail->comic_name}}</h4>
                                                                <h5>{{$review->review_title}}</h5>
                                                                <div class="review-rating">
                                                                    <div class="rating-result">
                                                                        @php($stars = $review->stars)
                                                                        @foreach(range(1,5) as $i)
                                                                            @if($stars >0)
                                                                                @if($stars >0.5)
                                                                                    <a><i class="fa fa-star fa_custom" style="color: #eeb900;"></i></a>
                                                                                @else
                                                                                    <a><i class="fa fa-star-half-o fa_custom" style="color: #eeb900;"></i></a>
                                                                                @endif
                                                                            @else
                                                                                <a><i class="fa  fa-star-o fa_custom" style="color: #eeb900;"></i></a>
                                                                            @endif
                                                                            <?php $stars--; ?>
                                                                        @endforeach
                                                                    </div>
                                                                    <br>
                                                                    <div class="review-details">
                                                                        <p> {!! $review->review_text !!}</p>
                                                                        <br>
                                                                        @php($userR = \App\Http\Controllers\UserController::getUserId($review->user_id))
                                                                        @php($username = $userR->username)
                                                                        <p style="font-size: 13px; margin: 0;">Review by {{$username}}</p>
                                                                        <p style="font-size: 10px; margin: 0;">Posted on {{\Carbon\Carbon::parse($review->review_date)->format('d/m/Y')}} </p>
                                                                        @if(Auth::user())
                                                                            @if(Auth::user()->hasGroup('il gruppo degli admin'))
                                                                                <div style="font-size: 24px;">
                                                                                    <a class="btn btn-danger" onclick="return myFunction();"  href="{{route('review-delete-local', $review->id)}}"><i class="fa fa-trash" ></i></a>
                                                                                    <script>
                                                                                        function myFunction() {
                                                                                            if(!confirm("Sei sicuro di voler eliminare questa recensione"))
                                                                                                event.preventDefault();
                                                                                            else{

                                                                                            }

                                                                                        }
                                                                                    </script>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-5"></div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>