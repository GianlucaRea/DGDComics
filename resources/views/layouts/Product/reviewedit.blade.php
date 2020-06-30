<div class="product-info-area">
    <div class="tab-content border-0" style="background-color: #ffffe6 ">
        <div class="mt-30"></div>
        <div class="tab-pane fade show active" id="addreview">
            <form method="POST" action="{{ Route('updatereviewuser', [$idreview = $review->id, $idcomic = $comic->id])}}">
                @csrf
                <h4>Modifica la tua recensione su: {{$comic->comic_name}}</h4>
                <div class="mb-3"></div>

                <div class="row">
                    <div style="margin-left:0.8%"></div>
                     
                    <label for="review_title">Titolo <sup>*</sup></label>
                    <input type="text" name="review_title" id="review_title" maxlength ="30" class="form-control @error('review_title') is-invalid @enderror" value = "{{ $review->title }}"/>
                    @error('review_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div style="margin-left:0.8%"></div>


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
                <textarea name="review_text" id="review_text" class="form-control @error('review_text') is-invalid @enderror" cols="30" rows="10" value="{{$review->review_text}}" style="resize: none; height: 200px; width: 800px "></textarea>
                @error('review_text')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
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