<!-- blog-main-area-start -->
<div class="blog-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2 mt-sm-50">
                <div class="single-blog mb-50">
                    <div class="blog-left-title">
                        <h3>Search</h3>
                    </div>
                    <div class="side-form">
                       <form action="{{ route('searcharticleroute') }}">
                            <input type="text" name="search" placeholder="Cerca un articolo..." />
                            <a  href="javascript:;" onclick="parentNode.submit();"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>
                <div class="section-title-5 mb-30">
                    <h2>Opzioni</h2>
                </div>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style>
                    .collapsible {
                        background-color: transparent;
                        color: #333;
                        font-family: 'Open Sans', sans-serif;
                        cursor: pointer;
                        padding: 18px;
                        width: 100%;
                        text-align: left;
                        font-size: 15px;
                        border-bottom: lightgray 1px solid;
                        border-right: none;
                        border-left: none;
                        border-top: none;
                    }

                    .collapsible:hover {
                        transition: .3s;
                        color: #f07c29;
                    }

                    .content2 {
                        padding: 0 18px;
                        max-height: 0;
                        overflow: hidden;
                        transition: max-height 0.2s ease-out;
                        background-color: white;
                    }
                </style>

                <button class="collapsible"><i class="fa fa-angle-down"></i> TAG</button>
                <div class="content2">
                    <div class="left-menu mb-30">
                        <ul>
                            @foreach($tags as $tag)
                                @php
                                    $numOfOcc = App\Http\Controllers\TagController::countArticle($tag->id);
                                @endphp
                                <li><a href= "{{route('taglist',['tag_name' => $tag->tag_name])}}">{{$tag->tag_name}}<span>({{$numOfOcc}})</span></a></li> <!-- Da finire -->
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- zona admin -->
            @if(\Illuminate\Support\Facades\Auth::user())
                @php($u = \Illuminate\Support\Facades\Auth::user())
                @if(\App\Http\Controllers\GroupController::isAdmin($u->id))

                        @if($articles->count() < 1)
                            <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
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
                            <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                                @foreach($articles as $article)
                                    @php($articleAuth = \App\Http\Controllers\UserController::getUserId($article->user_id))
                                    @php($articleComments = \App\Http\Controllers\CommentController::getcommentsByArticleId($article->id))
                                    @php($articleImage = \App\Http\Controllers\ArticleImageController::getImageByArticleId($article->id))
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
                                                    <h3><a href="{{ url('/blogDetail/'.$article->id) }}">{{ $article->title }}</a></h3>
                                                </div>
                                                <div class="blog-single-content">
                                                    @if(strlen($article->article_text)>680)
                                                        <p>{!! substr($article->article_text, 0, 680) !!}...</p>
                                                    @else
                                                        <p>{!! $article->article_text !!}</p>
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
                        <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                            <h4>non ci sono articoli nel blog :(</h4>
                        </div>
                    @endif
                    @if($articles->count() > 0)

                        <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                            @foreach($articles as $article)
                                @php($articleAuth = \App\Http\Controllers\UserController::getUserId($article->user_id))
                                @php($articleComments = \App\Http\Controllers\CommentController::getcommentsByArticleId($article->id))
                                @php($articleImage = \App\Http\Controllers\ArticleImageController::getImageByArticleId($article->id))
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
                                        <div class="blog-img mb-30">
                                            <a href="{{ url('/blogDetail/'.$article->id) }}"><img src="{{asset('img/comicsImages/' . $articleImage->image_name) }}" alt="blog" style=" background-repeat: no-repeat; background-size: contain; width: 878px; height: 345px;"/></a>
                                        </div>
                                        <div class="single-blog-content">
                                            <div class="single-blog-title">
                                                <h3><a href="{{ url('/blogDetail/'.$article->id) }}">{{ $article->title }}</a></h3>
                                            </div>
                                            <div class="blog-single-content">
                                                @if(strlen($article->article_text)>680)
                                                    <p>{!! substr($article->article_text, 0, 680) !!}...</p>
                                                @else
                                                    <p>{!! $article->article_text !!}</p>
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
                    <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                        <h4>non ci sono articoli nel blog :(</h4>
                    </div>
                @endif
                @if($articles->count() > 0)
                    <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                        @foreach($articles as $article)
                            @php($articleAuth = \App\Http\Controllers\UserController::getUserId($article->user_id))
                            @php($articleComments = \App\Http\Controllers\CommentController::getcommentsByArticleId($article->id))
                            @php($articleImage = \App\Http\Controllers\ArticleImageController::getImageByArticleId($article->id))
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
                                    <div class="blog-img mb-30">
                                        <a href="{{ url('/blogDetail/'.$article->id) }}"><img src="{{asset('img/comicsImages/' . $articleImage->image_name) }}" alt="blog" style=" background-repeat: no-repeat; background-size: contain; width: 878px; height: 345px;"/></a>
                                    </div>
                                    <div class="single-blog-content">
                                        <div class="single-blog-title">
                                            <h3><a href="{{ url('/blogDetail/'.$article->id) }}">{{ $article->title }}</a></h3>
                                        </div>
                                        <div class="blog-single-content">
                                            @if(strlen($article->article_text)>680)
                                                <p>{!! substr($article->article_text, 0, 680) !!}...</p>
                                            @else
                                                <p>{!! $article->article_text !!}</p>
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

<script>

    var coll = document.getElementsByClassName("collapsible");
    var i;
    const event = new Event("click")
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
        coll[0].dispatchEvent(event)
    }

</script>
<!-- blog-main-area-end -->