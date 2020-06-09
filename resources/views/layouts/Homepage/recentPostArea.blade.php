<!-- recent-post-area-start -->
<div class="recent-post-area pb-25">
    <div class="container">
        <div class="col-lg-12">
            <div class="section-title section-title-res pt-30 bt-3 text-center mb-30">
                <h2>Gli ultimi articoli del nostro Blog!</h2>
            </div>
        </div>
        <div class="row">
            @if(\App\Http\Controllers\ArticleController::getArticles()->count()<1)
                <div class="post-active owl-carousel text-center">
                    <div class="col-lg-12">
                        <h5>Oh, sembra che il blog sia vuoto, torna più tardi</h5>
                    </div>
                </div>
            @else
                @php($articles = \App\Http\Controllers\ArticleController::getArticles()->take(6))
                <div class="post-active owl-carousel text-center">
                        @foreach($articles as $article)
                            @php($authorOfArticle = \App\Http\Controllers\UserController::getUserId($article->user_id))
                            <div class="single-post">
                                <div class="post-content">
                                    <h3><a href="#">{{ $article->title }}</a></h3>
                                    <span class="meta-author"> {{ $authorOfArticle->username }} </span>
                                    <p>{{substr($article->article_text,0, 99)}}...</p>
                                </div>
                            </div>
                        @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
<!-- recent-post-area-end -->