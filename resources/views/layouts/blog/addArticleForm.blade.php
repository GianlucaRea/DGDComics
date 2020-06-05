<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="comment-title-wrap mt-30">
            <h3>Scrivi un'articolo!</h3>
        </div>
        <div class="comment-input mt-40">
            <div class="comment-input-textarea mb-30">
                @php($user = \Illuminate\Support\Facades\Auth::user())
                <form method="POST" action="{{ Route('submitArticle', ['user_id' => $user->id])}}">
                    @csrf
                    <label>titolo</label>
                    <textarea name="title" id="title" class="form-control @error('title') is-invalid @enderror" cols="30" rows="10" placeholder="Scrivi qui il tuo articolo" style="resize: none; height: 70px;"></textarea>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="mb-3"></div>
                    <label>testo</label>
                    <textarea name="article_text" id="article_text" class="form-control @error('article_text') is-invalid @enderror" cols="30" rows="10" placeholder="Scrivi qui il tuo articolo" style="resize: none; height: 500px;"></textarea>
                    @error('article_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="mb-3"></div>
                    <div class="single-post-button">
                        <button type="submit" class="btn btn-sqr">Pubblica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>