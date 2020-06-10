<div class="product-info-area">
    <div class="tab-content border-0" style="background-color: #ffffe6 ">
        <div class="mt-30"></div>
        <div class="tab-pane fade show active" id="addreview">
            <h4>Lascia una recensione su: {{$comic->comic_name}}</h4>
            <div class="mb-5"></div>
            <div class="review-field-ratings">
                <span>La tua opinione <sup>*</sup></span>
                <div class="control">
                    <div class="single-control">
                        <span>Stars</span>
                        <div class="review-control-vote">
                            <a><i class="fa fa-star"></i></a>
                            <a><i class="fa fa-star"></i></a>
                            <a><i class="fa fa-star"></i></a>
                            <a><i class="fa fa-star"></i></a>
                            <a><i class="fa fa-star"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-form">
                <div class="single-form single-form-2">
                    <label for="review_title">Titolo <sup>*</sup></label>
                    <form>
                        <input id="review_title" type="text" class="form-control @error('review_title') is invalid @enderror" name="review_title"  value="{{ old('review_title') }}" required autocomplete="review_title"/>
                        @error('review_title')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </form>
                </div>
                <div class="single1-form">
                    <label>Recensione <sup>*</sup></label>
                    <form>
                        <textarea name="review" cols="10" rows="10" style="resize: none; height: 10em; width:750px;"></textarea>
                    </form>
                </div>
            </div>
            <div class="review-form">
                <div class="row">
                    <div style="margin-left:11%"></div>
                    <div class="wc-proceed-to-checkout">
                        <button type="submit" class="btn btn-sqr" >Invia recensione </button>
                    </div>

                </div>
                <div class="mb-2"></div>
                <div class="row">
                    <div style="margin-left:7.6%"></div>
                    <div class="single-form single-form-2">
                        <label>i campi segnati con <sup>*</sup> sono obbligatori</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-info-area">
    <div class="tab-pane fade show active" style="background-color: #fff0e6 " id="review">
        <div class="valu">
            <div class="row">
                <div class="ml-3"></div>
                <div class="col-lg-2">
                    @if($reviews->count() > 0)
                        <h2>Recensioni</h2>
                    @elseif($reviews->count() <= 0)
                        <center><h2>Non ci sono Recensioni</h2></center>
                    @endif
                </div>
            </div>
            @foreach($reviews4 as $review)
                <div class="row">
                    <div class="ml-5"></div>
                    <div class="col-lg-10">
                        <h5>{{$review->review_title}}</h5>
                        <div class="review-rating">
                            <div class="rating-result">
                                @php($stars = $review->stars)
                                @foreach(range(1,5) as $i)
                                    @if($stars >0)
                                        @if($stars >0.5)
                                            <a><i class="fa fa-star fa_custom"></i></a>
                                        @else
                                            <a><i class="fa fa-star-half-o fa_custom"></i></a>
                                        @endif
                                    @else
                                        <a><i class="fa  fa-star-o fa_custom"></i></a>
                                    @endif
                                    <?php $stars--; ?>
                                @endforeach
                            </div>
                            <br>
                            <div class="review-details">
                                <p> {{$review->review_text}}</p>
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