<!-- blog-main-area-start -->
@php($articleAuth = \App\Http\Controllers\UserController::getUserId($article->user_id))
@php($articleComments = \App\Http\Controllers\CommentController::getcommentsByArticleId($article->id))
@php($articleImage = \App\Http\Controllers\ArticleImageController::getImageByArticleId($article->id))
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js" referrerpolicy="origin"></script>
@php($i = 0)
<div class="blog-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                <div class="blog-main-wrapper">
                    <div class="author-destils mb-30">
                        <div class="author-left">
                            <div class="author-description">
                                <p>Pubblicato da:
                                    <span>{{ $articleAuth->username }}</span>
                                </p>
                                <span>il {{ substr($article->date, 0,10) }}</span>
                            </div>
                        </div>
                        <div style="margin-left: 85%;">
                            @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                @if(\App\Http\Controllers\GroupController::isAdmin(\Illuminate\Support\Facades\Auth::user()->id))
                                    <div class ="row">
                                        <a class="btn btn-danger" onclick="return deleteArticle();"  href="{{route('article-delete-local', $article->id)}}"><i class="fa fa-trash"></i></a>
                                        <div class="ml-2"></div>
                                        <a class="btn btn-light" href="{{route('article-modify', $article->id)}}"><i class="fa fa-pencil"></i></a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="blog-img mb-30">
                        <a href="{{ url('/blogDetail/'.$article->id) }}"><img src="{{asset('img/comicsImages/' . $articleImage->image_name) }}" alt="blog" style=" background-repeat: no-repeat; background-size: contain; width: 878px; height: 345px;"/></a>
                    </div>
                    <div class="single-blog-content">
                        <div class="single-blog-title">
                            <h3>{{ $article->title }}</h3>
                        </div>
                        <div class="blog-single-content">
                            <p>{!! $article->article_text !!}</p>
                        </div>


                        <div class="product-attribute">
                                <p>
                                    <b>TAG:</b>
                                    @php($numberOfTag= $article->tag->count())
                                    @php($counter = 1)
                                    @foreach($article->tag as $tags)
                                        @if($counter < $numberOfTag)
                                            @php($counter++)
                                            <a href="{{route('taglist',['tag_name' => $tags->tag_name])}}"> {{$tags->tag_name}}</a>,
                                        @else
                                            <a href="{{route('taglist',['tag_name' => $tags->tag_name])}}"> {{$tags->tag_name}}</a>.
                                        @endif
                                    @endforeach
                                </p>
                        </div>


                    </div>
                    <div class="comment-title-wrap mt-30">
                        @if($articleComments->count() == 1)
                            <h3>{{ $articleComments->count() }} commento</h3>
                        @elseif($articleComments->count() > 1)
                            <h3>{{ $articleComments->count() }} commenti</h3>
                        @endif
                    </div>
                    <div class="mb-3"></div>
                    @php($comments = collect())
                    @foreach($articleComments as $articleComment)
                        @php($userComment = \App\Http\Controllers\UserController::getUserId($articleComment->user_id))
                        @if($comments->isEmpty())
                            @php($comments->push($articleComment->id))
                        @else
                            @if(!($comments->contains($articleComment->id)))
                                @php($comments->push($articleComment->id))
                            @else
                                @continue
                            @endif
                        @endif
                        <div class="comment-reply-wrap">
                            <ul>
                                <li>
                                    <div class="public-comment">
                                        <div class="public-text">
                                            <div class="single-comm-top">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        @php($isVendor = \App\Http\Controllers\GroupController::isVendor($userComment->id))
                                                        @if($isVendor)
                                                            <a href="{{url('vendor_detail/'.$userComment->id) }}"><h5>{{$userComment->username}}</h5></a>
                                                        @else
                                                            <a href="{{url('user_detail/'.$userComment->id) }}"><h5>{{$userComment->username}}</h5></a>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-7"></div>
                                                    @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                                        @if(\App\Http\Controllers\GroupController::isAdmin(\Illuminate\Support\Facades\Auth::user()->id))
                                                            <a class="btn btn-danger" onclick="return deleteComment();"  href="{{route('comment-delete-local', $articleComment->id)}}"><i class="fa fa-trash"></i></a>
                                                        @endif
                                                    @endif
                                                </div>
                                                <p>{{ substr($article->date, 0,10) }} {{--<a href="#">Rispondi</a></p>--}}
                                            </div>
                                            <p>{!! $articleComment->answer !!}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @php($answers = App\Http\Controllers\CommentController::answers($articleComment->id))
                        @if($answers->count() > 0)
                            @foreach($answers as $answer)
                                @if(!($comments->contains($answer->id)))
                                    @php($comments->push($answer->id))
                                @endif
                                    <div class="mt-1"></div>
                                    <div class="comment-reply-wrap ml-5">
                                        <ul>
                                            <li>
                                                <div class="public-comment">
                                                    <div class="public-text">
                                                        <div class="single-comm-top">
                                                            @php($u = \App\Http\Controllers\UserController::getUserId($answer->user_id))
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <h5>{{ $u->username }}</h5>
                                                                </div>
                                                                <div class="col-lg-7"></div>
                                                                @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                                                    @if(\App\Http\Controllers\GroupController::isAdmin(\Illuminate\Support\Facades\Auth::user()->id))
                                                                        <a class="btn btn-danger" onclick="return deleteComment();"  href="{{route('answer-delete-local', $answer->id)}}"><i class="fa fa-trash"></i></a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <p>{{ substr($answer->date, 0,10) }} {{--<a href="#">Rispondi</a></p>--}}
                                                        </div>
                                                        <p>{!! $answer->answer !!}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                            @endforeach
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()!=null)
                            <div class="comment-input mt-2">
                                <div class="comment-input-textarea ml-5">
                                    @php($user = \Illuminate\Support\Facades\Auth::user())
                                    <form method="POST" action="{{ Route('submitAnswer', ['comment' => $articleComment->id])}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-8">
                                                @php($i++)
                                               <script>
                                                   var iterazione = "<?php echo $i ?>";
                                                   var classe = new RegExp("#answer" + iterazione);
                                                   var classe1 = classe.toString();
                                                   var classe2 = classe1.substring(1, 9);
                                                    tinymce.init({
                                                        selector: classe2,
                                                        statusbar: false,
                                                        menubar: false,
                                                        height: 150,
                                                        width: 777,
                                                        max_chars: 511, // max. allowed chars
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
                                                            $('#' + this.id).prev().append('<div class="char_count" style="text-align:right"></div>');
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
                                                        $('#' + el.id).prev().find('.char_count').text(len + '/' + el.settings.max_chars);
                                                    }

                                                    function tinymce_getContentLength() {
                                                        return tinymce.get(tinymce.activeEditor.id).contentDocument.body.innerText.length;
                                                    }
                                                </script>
                                                <textarea id="{{'answer'.$i}}" name="{{'answer'}}" onclick="required(this)" class="answerDGD"></textarea>

                                                {{--@error('answer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror--}}


                                        {{--<textarea name="{{'answer'}}" id="{{'answer'}}" class="form-control @error('answer') is-invalid @enderror" cols="30" rows="10" placeholder="Scrivi una risposta!" style="resize: none; height: 70px;"></textarea>

                                                @error('answer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror--}}
                                            </div>
                                        </div>
                                        <div class="mt-3"></div>
                                        <div class="row">
                                            <div class="col-lg-8"></div>
                                            <div style="margin-left: 17.8%"></div>
                                        <div class="col-lg-1">
                                            <button type="submit" class="btn btn-sqr" name="{{'btnAnswer'}}" >Pubblica</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3"></div>
                    @endforeach
                    @if(\Illuminate\Support\Facades\Auth::user()!=null)
                    <div class="comment-title-wrap mt-30">
                        <h3>Lascia un commento!</h3>
                    </div>
                    <div class="comment-input mt-16">
                        <div class="comment-input-textarea mb-30">
                            @php($user = \Illuminate\Support\Facades\Auth::user())
                            <form method="POST" action="{{ Route('submitComment', ['article' => $article->id])}}">
                                @csrf


                                <script>
                                    tinymce.init({
                                        selector: '#comment_text',
                                        statusbar: false,
                                        menubar: false,
                                        height: 200
                                    });
                                </script>
                                <textarea id="comment_text" name="comment_text" class="form-control @error('comment_text') is-invalid @enderror"></textarea>

                                @error('comment_text')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror




                                {{--<textarea name="comment_text" id="comment_text" class="form-control @error('comment_text') is-invalid @enderror" cols="30" rows="10" style="resize: none; height: 10em;"></textarea>

                                @error('comment_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror--}}

                                <div class="mb-3"></div>
                                <div class="single-post-button">
                                    <button type="submit" class="btn btn-sqr">Pubblica</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteArticle() {
        if(!confirm("Sei sicuro di voler eliminare questo articolo?"))
            event.preventDefault();
    }
    function deleteComment() {
        if(!confirm("Sei sicuro di voler eliminare questo commento?"))
            event.preventDefault();
    }
</script>
<!-- blog-main-area-end -->