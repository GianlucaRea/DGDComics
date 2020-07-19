@php
    $comic = \App\Http\Controllers\ComicController::getByID($review->comic_id);
@endphp

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

<div class="row" style="width: 100%">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="comment-title-wrap mt-30">
            <h3>Modifica della Recensione Del Fumetto "{{$comic->comic_name}}"</h3>
        </div>
        <div class="mt-16"></div>

            @php($user = \Illuminate\Support\Facades\Auth::user())
            <form method="POST" action="{{ Route('updatereviewuser', $review->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <label>Titolo</label>
                <textarea name="review_title" id="review_title" class="form-control @error('review_title') is-invalid @enderror"  cols="30" rows="10"  style="resize: none; height: 70px;">{{$review->review_title}}</textarea>
                @error('review_title')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="mb-3"></div>
                    <label>Testo</label>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js" referrerpolicy="origin"></script>
                <script>
                    tinymce.init({
                        selector: '#review_text',
                        statusbar: false,
                        menubar: false,
                        height: 250,
                        max_chars: 2048, // max. allowed chars
                        setup: function (ed) {
                            var allowedKeys = [8, 37, 38, 39, 40, 46]; // backspace, delete and cursor keys
                            ed.on('keydown', function (e) {
                                if (allowedKeys.indexOf(e.keyCode) != -1) return true;
                                if (tinymce_getContentLength() + 1 > this.settings.max_chars) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    return false;
                                }
                                return true;
                            });
                            ed.on('keyup', function (e) {
                                tinymce_updateCharCounter(this, tinymce_getContentLength());
                            });
                        },
                        init_instance_callback: function () { // initialize counter div
                            $('#' + this.id).prev().append('<div class="char_count" style="text-align:right; padding-bottom: 5px; padding-right: 5px;"></div>');
                            tinymce_updateCharCounter(this, tinymce_getContentLength());
                        },
                        paste_preprocess: function (plugin, args) {
                            var editor = tinymce.get(tinymce.activeEditor.id);
                            var len = editor.contentDocument.body.innerText.length;
                            var text = $(args.content).text();
                            if (len + text.length > editor.settings.max_chars) {
                                alert('Pasting this exceeds the maximum allowed number of ' + editor.settings.max_chars + ' characters.');
                                args.content = '';
                            } else {
                                tinymce_updateCharCounter(editor, len + text.length);
                            }
                        }
                    });

                    function tinymce_updateCharCounter(el, len) {
                        $('#' + el.id).prev().find('.char_count').text('massimo numero di caratteri: '+len + '/' + el.settings.max_chars);
                    }

                    function tinymce_getContentLength() {
                        return tinymce.get(tinymce.activeEditor.id).contentDocument.body.innerText.length;
                    }
                </script>

                    <textarea id="review_text" class="form-control @error('review_text') is-invalid @enderror" name="review_text" >{!! $review->review_text !!}</textarea>
                    @error('review_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
                <div class="mt-2"></div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="rating-result">
                            @php($stars = $review->stars)
                            <p>Vecchia Valutazione</p>
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
                    </div>
                    <div class="col-lg-3">
                        Nuova Valutazione
                        <div style="margin-top: 0.8%"></div>
                        <div class="txt-center">
                            <div class="row">
                                <div style="margin-left: 3%"></div>
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
                    <div class="col-lg-5"></div>
                    <div class="col-lg-1">
                        <div class="mt-3"></div>
                        <div class="buttons-back">
                            <a href="{{ url('comic_detail/'.$comic->id) }}">Indietro</a>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="mt-3"></div>
                        <div class="single-post-button">
                            <button type="submit" class="btn btn-sqr">Modifica</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>