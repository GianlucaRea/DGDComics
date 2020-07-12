<div class="row" style="width: 100%">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="comment-title-wrap mt-30">
            <h3>Scrivi un'articolo!</h3>
        </div>
        <div class="comment-input mt-40">
            <div class="comment-input-textarea mb-30">
                @php($user = \Illuminate\Support\Facades\Auth::user())
                <form method="POST" action="{{ Route('submitArticle', ['user_id' => $user->id])}}" enctype="multipart/form-data">
                    @csrf
                    <label>titolo</label>
                    <textarea name="title" id="title" class="form-control @error('title') is-invalid @enderror" cols="30" rows="10"  style="resize: none; height: 70px;"></textarea>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="mb-3"></div>
                    <label>testo</label>
                    <!--TinyMce js-->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js" referrerpolicy="origin"></script>
                    <script>
                        tinymce.init({
                            selector: '#article_text',
                            statusbar: false,
                            menubar: false,
                            height: 350,
                        });
                    </script>

                    <textarea id="article_text" class="form-control @error('article_text') is-invalid @enderror" name="article_text" ></textarea>
                    @error('article_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                    <div class="mt-3"></div>

                    <label for="tag_name" class="required">Tag<span>*</span></label>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <input type="checkbox" id="Animation" name="Animation" value="Animation">  Animation
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Comiccon" name="Comiccon" value="Comiccon">  Comiccon
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Cosplay" name="Cosplay" value="Cosplay">  Cosplay
                                <div class="mt-1"></div>
                                <input type="checkbox" id="DC" name="DC" value="DC">  DC
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Design" name="Design" value="Design">  Design
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Digital Art" name="Digital Art" value="Digital Art">  Digital Art
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Fan Art" name="Fan Art" value="Fan Art">  Fan Art
                                <div class="mt-1"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <input type="checkbox" id="Humor" name="Humor" value="Humor">  Humor
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Illustrazioni" name="Illustrazioni" value="Illustrazioni">  Illustrazioni
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Italiano" name="Italiano" value="Italiano">  Italiano
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Manga" name="Manga" value="Manga">  Manga
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Marvel" name="Marvel" value="Marvel">  Marvel
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Novità" name="Novità" value="Novità">  Novità
                                <div class="mt-1"></div>
                                <input type="checkbox" id="Original Character" name="Original Character" value="Original Character">  Original Character
                                <div class="mt-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3"></div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="file" class="required">Immagine di copertina:<span>*</span></label>
                                <br/>
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
                    <div class="row">
                        <div style="margin-right: 1%"></div>

                        <div class="buttons-back">
                            <a href="{{url('/blog')}}">Indietro</a>
                        </div>
                        <div class="single-input-item">
                            <button type="submit" class="btn btn-sqr">pubblica</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>