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
            </div>
        </div>
        <div class="mt-3"></div>
    </div>
    <div class="mt-3"></div>
</div>


<div class="new-book-area pb-50">
    <div class="container">
        <div class="row">
        <h2>Recensioni Scritte</h2>
        </div>
        @php($reviews=\App\Http\Controllers\ReviewController::getAllWritedReview($user->id))
        @if($reviews->count() <= 0)
        <div class="row">
            <div class="col-lg-6">
                    <h3>Non ci sono Recensioni</h3>
            </div>
        </div>
        @endif
        @foreach($reviews as $review)
            @php($comicOfReviewVendorDetail = \App\Http\Controllers\ComicController::getByID($review->comic_id))
            <div class="row" style="border-bottom: lightgray 1px solid; padding-bottom: 5%">
                <div class="col-lg-12" style="padding-left: 0px;">
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
        {{ $reviews->links() }}
    </div>
</div>
