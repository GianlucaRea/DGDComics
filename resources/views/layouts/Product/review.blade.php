<div class="product-info-area mt-80">
    <div class="tab-content">
    <div class="tab-pane fade show active" id="review">
        <div class="valu">
            <div class="section-title mb-25 mt-25">
                @if($reviews->count() > 0)
                    <center><h2>Recensioni</h2></center>
                @elseif($reviews->count() <= 0)
                    <center><h2>Non ci sono Recensioni</h2></center>
                @endif
            </div>
            <ul>
                @foreach($reviews4 as $review)
                    <li style="width:310px; display:inline; float:left;">
                        <div class="review-title mb-25 mt-25">
                            <h3>{{$review->review_title}}</h3>
                        </div>
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
                                <textarea rows="5" cols="20" style="width: 150px" readonly> {{$review->review_text}}</textarea>
                                <br>
                                @php($userR = \App\Http\Controllers\UserController::getUserId($review->user_id))
                                @php($username = $userR->username)
                                <p class="review-author">Review by {{$username}}</p>
                                <p class="review-date">Posted on {{\Carbon\Carbon::parse($review->review_date)->format('d/m/Y')}} </p>
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
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
</div>
<div class="product-info-area mt-80">
    <div class="tab-content">
    <div class="tab-pane fade show active" id="addreview">
        <div class="review-add">
            <h4><center>{{$comic->comic_name}}</center></h4>
        </div>
        <div class="review-field-ratings">
            <span>La tua opinione <sup>*</sup></span>
            <div class="control">
                <div class="single-control">
                    <span>Stars</span>
                    <div class="review-control-vote">
                        <a  ><i class="fa fa-star"></i></a>
                        <a  ><i class="fa fa-star"></i></a>
                        <a  ><i class="fa fa-star"></i></a>
                        <a  ><i class="fa fa-star"></i></a>
                        <a  ><i class="fa fa-star"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-form">.
            <div class="single-form single-form-2">
                <label for="review_title">Titolo <sup>*</sup></label>
                <form>
                    <input id="review_title" type="text" class="form-control @error('review_title') is invalid @enderror" name="review_title"  value="{{ old('review_title') }}" required autocomplete="review_title"/>
                    @error('review_title')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </form>
            </div>
            <div class="single1-form">
                <label>Recensione <sup>*</sup></label>
                <form>
                    <textarea name="review" cols="10" rows="10"></textarea>
                </form>
            </div>
        </div>
        <div class="review-form-button">
            <form action>
                <a href="">Invia recensione</a>
            </form>
        </div>
    </div>
    </div>
</div>