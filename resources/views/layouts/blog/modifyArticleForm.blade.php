<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="comment-title-wrap mt-30">
            <h3>Modifica dell'articolo "{{$article->title}}"</h3>
        </div>
        <div class="comment-input mt-40">
            <div class="comment-input-textarea mb-30">
                @php($user = \Illuminate\Support\Facades\Auth::user())
                <form method="POST" action="{{ Route('modifyArticle', ['article_id' => $article->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <label>Titolo</label>
                    <textarea name="title" id="title" class="form-control @error('title') is-invalid @enderror"  cols="30" rows="10"  style="resize: none; height: 70px;">{{$article->title}}</textarea>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="mb-3"></div>
                    <label>Testo</label>
                    <textarea name="article_text" id="article_text" class="form-control @error('article_text') is-invalid @enderror" cols="30" rows="10" style="resize: none; height: 500px;">{{$article->article_text}}</textarea>
                    @error('article_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="mt-2"></div>


                    <label for="tag_name" class="required">Tag</label>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 13))
                                    <input type="checkbox" id="Animation" name="Animation" value="Animation" checked>  Animation
                                @else
                                    <input type="checkbox" id="Animation" name="Animation" value="Animation">  Animation
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 11))
                                    <input type="checkbox" id="Comiccon" name="Comiccon" value="Comiccon" checked>  Comiccon
                                @else
                                    <input type="checkbox" id="Comiccon" name="Comiccon" value="Comiccon">  Comiccon
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 9))
                                    <input type="checkbox" id="Cosplay" name="Cosplay" value="Cosplay" checked>  Cosplay
                                @else
                                    <input type="checkbox" id="Cosplay" name="Cosplay" value="Cosplay">  Cosplay
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 7))
                                    <input type="checkbox" id="DC" name="DC" value="DC" checked>  DC
                                @else
                                    <input type="checkbox" id="DC" name="DC" value="DC">  DC
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 12))
                                    <input type="checkbox" id="Design" name="Design" value="Design" checked>  Design
                                @else
                                    <input type="checkbox" id="Design" name="Design" value="Design">  Design
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 3))
                                    <input type="checkbox" id="Digital Art" name="Digital Art" value="Digital Art" checked>  Digital Art
                                @else
                                    <input type="checkbox" id="Digital Art" name="Digital Art" value="Digital Art">  Digital Art
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 4))
                                    <input type="checkbox" id="Fan Art" name="Fan Art" value="Fan Art" checked>  Fan Art
                                @else
                                    <input type="checkbox" id="Fan Art" name="Fan Art" value="Fan Art">  Fan Art
                                @endif

                                <div class="mt-1"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 10))
                                    <input type="checkbox" id="Humor" name="Humor" value="Humor" checked>  Humor
                                @else
                                    <input type="checkbox" id="Humor" name="Humor" value="Humor">  Humor
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 2))
                                    <input type="checkbox" id="Illustrazioni" name="Illustrazioni" value="Illustrazioni" checked>  Illustrazioni
                                @else
                                    <input type="checkbox" id="Illustrazioni" name="Illustrazioni" value="Illustrazioni">  Illustrazioni
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 8))
                                    <input type="checkbox" id="Italiano" name="Italiano" value="Italiano" checked>  Italiano
                                @else
                                    <input type="checkbox" id="Italiano" name="Italiano" value="Italiano">  Italiano
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 5))
                                    <input type="checkbox" id="Manga" name="Manga" value="Manga" checked>  Manga
                                @else
                                    <input type="checkbox" id="Manga" name="Manga" value="Manga">  Manga
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 6))
                                    <input type="checkbox" id="Marvel" name="Marvel" value="Marvel" checked>  Marvel
                                @else
                                    <input type="checkbox" id="Marvel" name="Marvel" value="Marvel">  Marvel
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 1))
                                    <input type="checkbox" id="Novità" name="Novità" value="Novità" checked>  Novità
                                @else
                                    <input type="checkbox" id="Novità" name="Novità" value="Novità">  Novità
                                @endif

                                <div class="mt-1"></div>

                                @if(\App\Http\Controllers\ArticleController::isTagOfArticle($article->id, 14))
                                    <input type="checkbox" id="Original Character" name="Original Character" value="Original Character" checked>  Original Character
                                @else
                                    <input type="checkbox" id="Original Character" name="Original Character" value="Original Character">  Original Character
                                @endif

                                <div class="mt-1"></div>
                            </div>
                        </div>
                    </div>
                    @php($articleImage = \App\Http\Controllers\ArticleImageController::getImageByArticleId($article->id))
                    <div class="mb-3"></div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="file" class="required">Immagine di copertina attuale:</label>
                                <br/>
                                <div class="blog-img mb-30">
                                    <img src="{{asset('img/comicsImages/' . $articleImage->image_name) }}" alt="blog" style=" background-repeat: no-repeat; background-size: contain; width: 878px; height: 345px;"/>
                                </div>
                                <label for="file" class="required">Nuova immagine di copertina:</label>
                                <input type="file" id="articleImage" name="articleImage" class="form-control @error('articleImage') is-invalid @enderror">
                                @error('articleImage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3"></div>
                    <div class="single-post-button">
                        <button type="submit" class="btn btn-sqr">modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>