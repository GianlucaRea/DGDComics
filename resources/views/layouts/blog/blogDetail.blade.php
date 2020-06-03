<!-- blog-main-area-start -->
@php($articleAuth = \App\Http\Controllers\UserController::getUserId($article->user_id))
@php($articleComments = \App\Http\Controllers\CommentController::getcommentsByArticleId($article->id))
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
                    </div>
                    {{--<div class="blog-img mb-30">
                        <img src="{{ asset('img/blog/1.jpg') }}" alt="blog" />
                    </div>--}}
                    <div class="single-blog-content">
                        <div class="single-blog-title">
                            <h3>{{ $article->title }}</h3>
                        </div>
                        <div class="blog-single-content">
                            <p>{{ $article->article_text }}</p>
                        </div>
                    </div>
                    <div class="comment-title-wrap mt-30">
                        @if($articleComments->count() == 1)
                            <h3>{{ $articleComments->count() }} commento</h3>
                        @else
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
                                                <h5>{{ $userComment->username }}</h5>
                                                <p>{{ substr($article->date, 0,10) }} {{--<a href="#">Rispondi</a></p>--}}
                                            </div>
                                            <p>{{ $articleComment->answer }}</p>
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
                                                            caso in cui ci sono risposte
                                                        </div>
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
                                        <label>Rispondi</label>
                                        <div class="row">
                                            <div class="col-lg-8">
                                        <textarea name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror" cols="30" rows="10" placeholder="Scrivi qui il tuo commento" style="resize: none; height: 70px;"></textarea>
                                            </div>
                                        <div class="col-lg-4">
                                            <button type="submit" class="btn btn-sqr">Pubblica</button>
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
                    <div class="comment-input mt-40">
                        <div class="comment-input-textarea mb-30">
                            @php($user = \Illuminate\Support\Facades\Auth::user())
                            <form method="POST" action="{{ Route('submitComment', ['article' => $article->id])}}">
                                @csrf
                                <label>Commento</label>
                                <textarea name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror" cols="30" rows="10" placeholder="Scrivi qui il tuo commento" style="resize: none; height: 10em;"></textarea>
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
<!-- blog-main-area-end -->