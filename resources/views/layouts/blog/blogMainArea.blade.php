<!-- blog-main-area-start -->
<div class="blog-main-area mb-70">
    <div class="container">

        <div class="row">
            @if(\Illuminate\Support\Facades\Auth::user()) <!-- zona admin -->
                @php($u = \Illuminate\Support\Facades\Auth::user())
                @if(\App\Http\Controllers\GroupController::isAdmin($u->id))

                        @if($articles->count() < 1)
                            <div class="col-lg-12 col-md-12 col-12 order-lg-2 order-1">
                                <h4>non ci sono articoli nel blog :(</h4>
                                <div class="row">
                                    <div class="col-lg-8"></div>
                                    <div class="col-lg-4">
                                        <div class="write-button">
                                            <a href="{{route('/writeArticle')}}">scrivi articolo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($articles->count() > 0)
                            <div class="col-lg-12 col-md-12 col-12 order-lg-2 order-1">
                                @foreach($articles as $article)
                                    @php($articleAuth = \App\Http\Controllers\UserController::getUserId($article->user_id))
                                    @php($articleComments = \App\Http\Controllers\CommentController::getcommentsByArticleId($article->id))
                                    <div class="blog-main-wrapper">
                                        <div class="single-blog-post">
                                            <div class="author-destils mb-30">
                                                <div class="author-left">
                                                    <div class="author-description">
                                                        <p>Pubblicato da:
                                                            <span>{{ $articleAuth->username }}</span>in
                                                        </p>
                                                        <span>il {{ substr($article->date, 0,10) }}</span>
                                                    </div>
                                                </div>
                                                <div style="margin-left: 90%;">
                                                    @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                                        @if(\App\Http\Controllers\GroupController::isAdmin(\Illuminate\Support\Facades\Auth::user()->id))
                                                            <div class ="row">
                                                                <a class="btn btn-danger" onclick="return deleteArticle();"  href="{{route('article-delete-local', $article->id)}}"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            {{--<div class="blog-img mb-30">
                                                <a href="#"><img src="img/blog/1.jpg" alt="blog" /></a>
                                            </div>--}}
                                            <div class="single-blog-content">
                                                <div class="single-blog-title">
                                                    <h3><a href="{{ url('/blogDetail/'.$article->id) }}">{{ $article->title }}</a></h3>
                                                </div>
                                                <div class="blog-single-content">
                                                    @if(strlen($article->article_text)>680)
                                                        <p>{{ substr($article->article_text, 0, 680)}}...</p>
                                                    @else
                                                        <p>{{ $article->article_text }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="blog-comment-readmore">
                                                <div class="blog-readmore">
                                                    <a href="{{ url('/blogDetail/'.$article->id) }}">Leggi di più<i class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                                <div class="blog-com">
                                                    @if($articleComments->count() == 1)
                                                        {{ $articleComments->count() }} commento
                                                    @else
                                                        {{ $articleComments->count() }} commenti
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="row">
                                        <div class="col-lg-8"></div>
                                        <div class="col-lg-4">
                                            <div class="write-button">
                                                <a href="{{url('/writeArticle')}}">scrivi articolo</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endif

                @else <!-- zona non admin -->

                    @if($articles->count() < 1)
                        <div class="col-lg-12 col-md-12 col-12 order-lg-2 order-1">
                            <h4>non ci sono articoli nel blog :(</h4>
                        </div>
                    @endif
                    @if($articles->count() > 0)
                        <div class="col-lg-12 col-md-12 col-12 order-lg-2 order-1">
                            @foreach($articles as $article)
                                @php($articleAuth = \App\Http\Controllers\UserController::getUserId($article->user_id))
                                @php($articleComments = \App\Http\Controllers\CommentController::getcommentsByArticleId($article->id))
                                <div class="blog-main-wrapper">
                                    <div class="single-blog-post">
                                        <div class="author-destils mb-30">
                                            <div class="author-left">
                                                <div class="author-description">
                                                    <p>Pubblicato da:
                                                        <span>{{ $articleAuth->username }}</span>in
                                                    </p>
                                                    <span>il {{ substr($article->date, 0,10) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="blog-img mb-30">
                                            <a href="#"><img src="img/blog/1.jpg" alt="blog" /></a>
                                        </div>--}}
                                        <div class="single-blog-content">
                                            <div class="single-blog-title">
                                                <h3><a href="{{ url('/blogDetail/'.$article->id) }}">{{ $article->title }}</a></h3>
                                            </div>
                                            <div class="blog-single-content">
                                                @if(strlen($article->article_text)>680)
                                                    <p>{{ substr($article->article_text, 0, 680)}}...</p>
                                                @else
                                                    <p>{{ $article->article_text }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="blog-comment-readmore">
                                            <div class="blog-readmore">
                                                <a href="{{ url('/blogDetail/'.$article->id) }}">Leggi di più<i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                            <div class="blog-com">
                                                @if($articleComments->count() == 1)
                                                    {{ $articleComments->count() }} commento
                                                @else
                                                    {{ $articleComments->count() }} commenti
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            @else <!-- zona user non loggato -->

                @if($articles->count() < 1)
                    <div class="col-lg-12 col-md-12 col-12 order-lg-2 order-1">
                        <h4>non ci sono articoli nel blog :(</h4>
                    </div>
                @endif
                @if($articles->count() > 0)
                    <div class="col-lg-12 col-md-12 col-12 order-lg-2 order-1">
                        @foreach($articles as $article)
                            @php($articleAuth = \App\Http\Controllers\UserController::getUserId($article->user_id))
                            @php($articleComments = \App\Http\Controllers\CommentController::getcommentsByArticleId($article->id))
                            <div class="blog-main-wrapper">
                                <div class="single-blog-post">
                                    <div class="author-destils mb-30">
                                        <div class="author-left">
                                            <div class="author-description">
                                                <p>Pubblicato da:
                                                    <span>{{ $articleAuth->username }}</span>in
                                                </p>
                                                <span>il {{ substr($article->date, 0,10) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="blog-img mb-30">
                                        <a href="#"><img src="img/blog/1.jpg" alt="blog" /></a>
                                    </div>--}}
                                    <div class="single-blog-content">
                                        <div class="single-blog-title">
                                            <h3><a href="{{ url('/blogDetail/'.$article->id) }}">{{ $article->title }}</a></h3>
                                        </div>
                                        <div class="blog-single-content">
                                            @if(strlen($article->article_text)>680)
                                                <p>{{ substr($article->article_text, 0, 680)}}...</p>
                                            @else
                                                <p>{{ $article->article_text }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="blog-comment-readmore">
                                        <div class="blog-readmore">
                                            <a href="{{ url('/blogDetail/'.$article->id) }}">Leggi di più<i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                        <div class="blog-com">
                                            @if($articleComments->count() == 1)
                                                {{ $articleComments->count() }} commento
                                            @else
                                                {{ $articleComments->count() }} commenti
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
                <div class="col-lg-12 col-md-12 col-12 order-lg-2 order-1">
                    <div class="pagination-area mt-50">
                        <div class="list-page-2">
                            <p>Items {{$articles->count()}} of {{$articles->total()}}</p>
                        </div>
                        <div class="page-number">
                            <ul>
                                <li> {{$articles->links()}} </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pt-30"></div>
                </div>
        </div>
    </div>

<script>
    function deleteArticle() {
        if(!confirm("Sei sicuro di voler eliminare questo articolo?"))
            event.preventDefault();
    }
</script>
</div>
<!-- blog-main-area-end -->