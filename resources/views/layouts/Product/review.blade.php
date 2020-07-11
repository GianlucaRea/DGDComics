<style>
    .txt-center {
        text-align: center;
    }
    .hide {
        display: none;
    }

    .clear {
        float: none;
        clear: both;
    }

    .rating {
        width: 90px;
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
        position: relative;
    }

    .rating > label {
        float: right;
        display: inline;
        padding: 0;
        margin: 0;
        position: relative;
        width: 1.1em;
        cursor: pointer;
        color: #000;
        font-size: 16px;
        margin-top: 6px;
    }

    .rating > label:hover,
    .rating > label:hover ~ label,
    .rating > input.radio-btn:checked ~ label{
        color: transparent;
        font-size: 16px;
    }

    .rating > label:hover:before,
    .rating > label:hover ~ label:before,
    .rating > input.radio-btn:checked ~ label:before,
    .rating > input.radio-btn:checked ~ label:before {
        content: "\2605";
        position: absolute;
        left: 0;
        color: #FFD700;
        font-size: 16px;
    }

</style>

@if($isNotPassed)
    <script>
        function alert() {
            if(!confirm("Ehy, sembra che ci sia stato un errore, sicuro di aver riempito tutti i campi? stelle comprese? se l'errore persiste sentiti libero di contattarci!"))
                event.preventDefault();
        }
        alert();
    </script>
@endif

<div class="product-info-area">
    <div class="tab-content border-0">
        <div class="mt-30"></div>
        <div class="tab-pane fade show active" id="addreview">
            <form method="POST" action="{{ Route('submitReview', ['id' => $comic->id])}}">
                @csrf
            <h4>Lascia una recensione su: {{$comic->comic_name}}</h4>
            <div class="mb-3"></div>

                <div class="row">
                    <div style="margin-left:0.8%"></div>
                    <label>Titolo <sup>*</sup></label>
                </div>
                <div class="row">
                    <div style="margin-left:0.8%"></div>
                <textarea name="review_title" id="review_title" class="form-control @error('review_title') is-invalid @enderror" cols="30" rows="10" placeholder="Scrivi qui il titolo della Recensione" style="resize: none; height: 40px; width: 500px"></textarea>
                @error('review_title')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    <div style="margin-left:0.8%;"></div>
                    <div class="txt-center">
                        <div class="row">
                            <div class="rating">
                                <input id="stars5" name="stars" type="radio" value="5" class="radio-btn hide" />
                                <label for="stars5" ><i class="fa fa-star"></i></label>
                                <input id="star4" name="stars" type="radio" value="4" class="radio-btn hide" />
                                <label for="star4" ><i class="fa fa-star" ></i></label>
                                <input id="star3" name="stars" type="radio" value="3" class="radio-btn hide" />
                                <label for="star3" ><i class="fa fa-star"></i></label>
                                <input id="star2" name="stars" type="radio" value="2" class="radio-btn hide" />
                                <label for="star2" ><i class="fa fa-star"></i></label>
                                <input id="star1" name="stars" type="radio" value="1" class="radio-btn hide"/>
                                <label for="star1" ><i class="fa fa-star"></i></label>
                                <div class="clear"></div>
                            </div>
                            *
                        </div>
                    </div>
                </div>
                <div class="mt-3"></div>

                <label>testo <sup>*</sup> (almeno 10 caratteri)</label>
                <script src="https://cdn.tiny.cloud/1/9jdvep5qo4jodgljrzr63bxgi2z14pz8rxk2a6g4d50af1xm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                <script>
                    tinymce.init({
                        selector: '#review_text',
                        statusbar: false,
                        menubar: false,
                        height: 200,
                        width: 650
                    });
                </script>

                <textarea id="review_text" name="review_text" ></textarea>
                @error('review_text')
                <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror

                <div class="mt-3"></div>

                @if(\Illuminate\Support\Facades\Auth::user() != null)
                    <div style="margin-left:11%"></div>
                    <div class="wc-proceed-to-checkout">
                        <button type="submit" class="btn btn-sqr" >Invia recensione </button>
                    </div>
                @else
                    <div style="margin-left:11%"></div>
                    <div class="wc-proceed-to-checkout">
                        <a href="{{url('/login') }}" class="btn btn-sqr" >Invia recensione </a>
                    </div>
                @endif



                <div class="mb-2"></div>

                    <div style="margin-left:7.6%"></div>

                        <label>i campi segnati con <sup>*</sup> sono obbligatori</label>
            </form>
        </div>
    </div>
</div>


<div class="product-info-area">
    <div class="tab-pane fade show active"  id="review">
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
                                    @php($user = Auth::user())
                                    @php($isAuthor = \App\Http\Controllers\ReviewController::CheckAuthor($review->id,$user->id))
                                    @if($isAuthor)
                                        <div style="font-size: 24px;">
                                            <a class="btn btn-light"  href="{{route('editreviewuser', $review->id)}}"><i class="fa fa-pencil" ></i></a>
                                        </div>

                                    @else
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
