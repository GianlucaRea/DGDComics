@php
    $comic = \App\Http\Controllers\ComicController::getByID($review->comic_id);
@endphp
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="comment-title-wrap mt-30">
            <h3>Modifica della Recensione Del Fumetto "{{$comic->comic_name}}"</h3>
        </div>
        <div class="comment-input mt-40">
            <div class="comment-input-textarea mb-30">
                @php($user = \Illuminate\Support\Facades\Auth::user())
                <form method="POST" action="{{ Route('updatereviewuser', $review->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <label>Titolo</label>
                    <textarea name="review_title" id="review_title" class="form-control @error('title') is-invalid @enderror"  cols="30" rows="10"  style="resize: none; height: 70px;">{{$review->review_title}}</textarea>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="mb-3"></div>
                    <label>Testo</label>
                    <textarea name="review_text" id="review_text" class="form-control @error('review_text') is-invalid @enderror" cols="30" rows="10" style="resize: none; height: 500px;">{{$review->review_text}}</textarea>
                    @error('article_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="mt-2"></div>
                    <div class="rating-result">
                        @php($stars = $review->stars)
                        <p>Vecchia Valutazione</p>
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
                    <div class="mb-3"></div>
                        <br>
                    <p>Nuova Valutazione</p>
                    <div style="margin-left:0.8%;"></div>
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
                    <div class="single-post-button">
                        <button type="submit" class="btn btn-sqr">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>