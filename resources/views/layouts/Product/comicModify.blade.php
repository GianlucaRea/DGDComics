<div class="container">
    <fieldset>
        <legend>
            Modifica fumetto
        </legend>
        <div class="col-lg-12 col-md-12 col-12">
            <div class="billing-fields">
                <form method="POST" action="{{ route('modifyComic', ['comic_id' => $comic->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-input-item">
                                <label for="comic_name" class="required">Titolo Fumetto<span>*</span></label>
                                <input id="comic_name" type="text" class="form-control @error('comic_name') is-invalid @enderror" name="comic_name" value="{{ $comic->comic_name }}">
                                @error('comic_name')
                                <span class="invalid-feedback" role="alert">
                                 <strong>
                                      {{ $message }}
                                 </strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-2"></div>

                    {{--<div class="row">
                        <div class="col-lg-12">
                            <div class="single-input-item">
                                <label for="description" class="required">Descrizione<span>*</span></label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Descrizione" style="resize: none; height: 100px; background-color: white">{{ $comic->description }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>--}}

                    <div class="mt-2"></div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="description" class="required">Descrizione<span>*</span></label>

                            <!--TinyMce js-->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js" referrerpolicy="origin"></script>
                            <script>
                                tinymce.init({
                                    selector: '#description',
                                    statusbar: false,
                                    menubar: false,
                                    height: 200
                                });
                            </script>

                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" >{!! $comic->description !!}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{ $message }}
                                                                            </strong>
                                                                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-2"></div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="ISBN" class="required">ISBN<span>*</span></label>
                                <input id="ISBN" type="text" class="form-control @error('ISBN') is-invalid @enderror" name="ISBN" value="{{ $comic->ISBN }}">
                                @error('ISBN')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="publisher" class="required">Casa Editrice<span>*</span></label>
                                <input id="publisher" type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ $comic->publisher }}">
                                @error('publisher')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-2"></div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="author_name" class="required">Autore<span>*</span></label>
                                <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ $author->name_author }}">
                                @error('author_name')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="language" class="required">Lingua<span>*</span></label>
                                <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{$comic->language}}">
                                @error('language')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-2"></div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="type" class="required">Tipo<span>*</span></label>
                                <br/>

                                @if($comic->type == 'shonen')
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="shonen"> shonen </option>
                                        <option value="seinen"> seinen </option>
                                        <option value="shojo"> shojo </option>
                                        <option value="josei"> josei </option>
                                        <option value="dc"> dc </option>
                                        <option value="marvel"> marvel </option>
                                        <option value="italiano"> italiano </option>
                                        <option value="other"> other </option>
                                    </select>
                                @endif

                                @if($comic->type == 'seinen')
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="seinen"> seinen </option>
                                        <option value="shonen"> shonen </option>
                                        <option value="shojo"> shojo </option>
                                        <option value="josei"> josei </option>
                                        <option value="dc"> dc </option>
                                        <option value="marvel"> marvel </option>
                                        <option value="italiano"> italiano </option>
                                        <option value="other"> other </option>
                                    </select>
                                @endif

                                @if($comic->type == 'shojo')
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="shojo"> shojo </option>
                                        <option value="shonen"> shonen </option>
                                        <option value="seinen"> seinen </option>
                                        <option value="josei"> josei </option>
                                        <option value="dc"> dc </option>
                                        <option value="marvel"> marvel </option>
                                        <option value="italiano"> italiano </option>
                                        <option value="other"> other </option>
                                    </select>
                                @endif

                                @if($comic->type == 'josei')
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="josei"> josei </option>
                                        <option value="shonen"> shonen </option>
                                        <option value="seinen"> seinen </option>
                                        <option value="shojo"> shojo </option>
                                        <option value="dc"> dc </option>
                                        <option value="marvel"> marvel </option>
                                        <option value="italiano"> italiano </option>
                                        <option value="other"> other </option>
                                    </select>
                                @endif

                                @if($comic->type == 'dc')
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="dc"> dc </option>
                                        <option value="shonen"> shonen </option>
                                        <option value="seinen"> seinen </option>
                                        <option value="shojo"> shojo </option>
                                        <option value="josei"> josei </option>
                                        <option value="marvel"> marvel </option>
                                        <option value="italiano"> italiano </option>
                                        <option value="other"> other </option>
                                    </select>
                                @endif

                                @if($comic->type == 'marvel')
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="marvel"> marvel </option>
                                        <option value="shonen"> shonen </option>
                                        <option value="seinen"> seinen </option>
                                        <option value="shojo"> shojo </option>
                                        <option value="josei"> josei </option>
                                        <option value="dc"> dc </option>
                                        <option value="italiano"> italiano </option>
                                        <option value="other"> other </option>
                                    </select>
                                @endif

                                @if($comic->type == 'italiano')
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="italiano"> italiano </option>
                                        <option value="shonen"> shonen </option>
                                        <option value="seinen"> seinen </option>
                                        <option value="shojo"> shojo </option>
                                        <option value="josei"> josei </option>
                                        <option value="dc"> dc </option>
                                        <option value="marvel"> marvel </option>
                                        <option value="other"> other </option>
                                    </select>
                                @endif

                                @if($comic->type == 'other')
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="other"> other </option>
                                        <option value="shonen"> shonen </option>
                                        <option value="seinen"> seinen </option>
                                        <option value="shojo"> shojo </option>
                                        <option value="josei"> josei </option>
                                        <option value="dc"> dc </option>
                                        <option value="marvel"> marvel </option>
                                        <option value="italiano"> italiano </option>
                                    </select>
                                @endif



                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item"></div>
                        </div>
                    </div>
                    <div class="mt-2"></div>

                    <label for="genre_name" class="required">Generi<span>*</span></label>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">

                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 7))
                                    <input type="checkbox" id="Alternativo" name="Alternativo" value="Alternativo" checked>  Alternativo
                                @else
                                    <input type="checkbox" id="Alternativo" name="Alternativo" value="Alternativo">  Alternativo
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 1))
                                    <input type="checkbox" id="Avventura" name="Avventura" value="Avventura" checked>  Avventura
                                @else
                                    <input type="checkbox" id="Avventura" name="Avventura" value="Avventura">  Avventura
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 2))
                                    <input type="checkbox" id="Fantascienza" name="Fantascienza" value="Fantascienza" checked>  Fantascienza
                                @else
                                    <input type="checkbox" id="Fantascienza" name="Fantascienza" value="Fantascienza">  Fantascienza
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 3))
                                    <input type="checkbox" id="Fantasy" name="Fantasy" value="Fantasy" checked>  Fantasy
                                @else
                                    <input type="checkbox" id="Fantasy" name="Fantasy" value="Fantasy">  Fantasy
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 4))
                                    <input type="checkbox" id="Azione" name="Azione" value="Azione" checked>  Azione
                                @else
                                    <input type="checkbox" id="Azione" name="Azione" value="Azione">  Azione
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 5))
                                    <input type="checkbox" id="Umoristico" name="Umoristico" value="Umoristico" checked>  Umoristico
                                @else
                                    <input type="checkbox" id="Umoristico" name="Umoristico" value="Umoristico">  Umoristico
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 6))
                                    <input type="checkbox" id="Western" name="Western" value="Western" checked>  Western
                                @else
                                    <input type="checkbox" id="Western" name="Western" value="Western">  Western
                                @endif
                                <div class="mt-1"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 8))
                                    <input type="checkbox" id="Supereroi" name="Supereroi" value="Supereroi" checked>  Supereroi
                                @else
                                    <input type="checkbox" id="Supereroi" name="Supereroi" value="Supereroi">  Supereroi
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 9))
                                    <input type="checkbox" id="Horror" name="Horror" value="Horror" checked>  Horror
                                @else
                                    <input type="checkbox" id="Horror" name="Horror" value="Horror">  Horror
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 10))
                                    <input type="checkbox" id="Thriller" name="Thriller" value="Thriller" checked>  Thriller
                                @else
                                    <input type="checkbox" id="Thriller" name="Thriller" value="Thriller">  Thriller
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 11))
                                    <input type="checkbox" id="Giallo" name="Giallo" value="Giallo" checked>  Giallo
                                @else
                                    <input type="checkbox" id="Giallo" name="Giallo" value="Giallo">  Giallo
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 12))
                                    <input type="checkbox" id="Disney" name="Disney" value="Disney" checked>  Disney
                                @else
                                    <input type="checkbox" id="Disney" name="Disney" value="Disney">  Disney
                                @endif
                                <div class="mt-1"></div>
                                @if(\App\Http\Controllers\ComicController::isgenreOfComic($comic->id, 13))
                                    <input type="checkbox" id="Post pocalittico" name="PostApocalittico" value="PostApocalittico" checked>  Post Apocalittico
                                @else
                                    <input type="checkbox" id="PostApocalittico" name="PostApocalittico" value="PostApocalittico">  Post Apocalittico
                                @endif
                                <div class="mt-1"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2"></div>

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="price"> Prezzo (no virgola)<span>*</span></label>
                        </div>
                        <div class="col-lg-4">
                            <label for="price"> Quantità<span>*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $comic->price }}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $comic->quantity }}" min="1">
                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-2"></div>

                    <div class="row">
                        <div class="col-lg-9">
                            <label for="dimenction"> Dimensioni</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="single-input-item">
                                <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $comic->height }}" min="1">
                                @error('height')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                @enderror
                            </div>
                        </div>
                        x
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <input id="length" type="number" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ $comic->length }}" min="1">
                                @error('length')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                @enderror
                            </div>
                        </div>
                        x
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <input id="width" type="number" class="form-control @error('width') is-invalid @enderror" name="width" value="{{ $comic->width }}" min="1">
                                @error('width')
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $message }}
                                                                                </strong>
                                                                            </span>
                                @enderror
                            </div>
                        </div>
                        cm
                        <div class="mt-2"></div>
                    </div>
                    @php($cover = \App\Http\Controllers\ImageController::getCover($comic->id))
                    <div class="mt-2"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <label for="file" class="required">Copertina attuale:<span>*</span></label>
                                <br/>
                                <img src="{{asset('img/comicsImages/' . $cover->image_name) }}" style=" background-repeat: no-repeat; background-size: contain; width: 180px; height: 270px;"/>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="single-input-item">
                                <input type="file" id="cover" name="cover"  class="form-control @error('cover') is-invalid @enderror" style="margin-bottom: 5px;">
                                @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>






                    <div class="mt-2"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="file" class="required">Altre immagini:</label>
                        </div>
                    </div>

                    @php($image1 = \App\Http\Controllers\ImageController::getImageByNumber($comic->id, 1))
                    @php($image2 = \App\Http\Controllers\ImageController::getImageByNumber($comic->id, 2))
                    @php($image3 = \App\Http\Controllers\ImageController::getImageByNumber($comic->id, 3))
                    @php($image4 = \App\Http\Controllers\ImageController::getImageByNumber($comic->id, 4))

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <label for="file" class="required">Immagine 1</label>
                                <br/>
                                @if($image1 != null)
                                    <img src="{{asset('img/comicsImages/' . $image1->image_name) }}" style=" background-repeat: no-repeat; background-size: contain; width: 180px; height: 270px;"/>
                                @else
                                    <img src="{{asset('img/immaginiNostre/inserisciNuovaImmagine.jpg') }}" style=" background-repeat: no-repeat; background-size: contain; width: 180px; height: 270px;"/>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <label for="file" class="required">Immagine 2</label>
                                <br>
                                @if($image2 != null)
                                    <img src="{{asset('img/comicsImages/' . $image2->image_name) }}" style=" background-repeat: no-repeat; background-size: contain; width: 180px; height: 270px;"/>
                                @else
                                    <img src="{{asset('img/immaginiNostre/inserisciNuovaImmagine.jpg') }}" style=" background-repeat: no-repeat; background-size: contain; width: 180px; height: 270px;"/>
                                @endif        </div>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="single-input-item">
                                <input type="file" id="image1" name="image1"  class="form-control @error('image1') is-invalid @enderror" style="margin-bottom: 5px;">
                                @error('image1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><div class="col-lg-1">
                        </div><div class="col-lg-3">
                            <div class="single-input-item">
                                <input type="file" id="image2" name="image2"  class="form-control @error('image2') is-invalid @enderror" style="margin-bottom: 5px;">
                                @error('image2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>






                    <div class="mt-2"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <label for="file" class="required">Immagine 3</label>
                                <br/>
                                @if($image3 != null)
                                    <img src="{{asset('img/comicsImages/' . $image3->image_name) }}" style=" background-repeat: no-repeat; background-size: contain; width: 180px; height: 270px;"/>
                                @else
                                    <img src="{{asset('img/immaginiNostre/inserisciNuovaImmagine.jpg') }}" style=" background-repeat: no-repeat; background-size: contain; width: 180px; height: 270px;"/>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <label for="file" class="required">Immagine 4</label>
                                <br>
                                @if($image4 != null)
                                    <img src="{{asset('img/comicsImages/' . $image4->image_name) }}" style=" background-repeat: no-repeat; background-size: contain; width: 180px; height: 270px;"/>
                                @else
                                    <img src="{{asset('img/immaginiNostre/inserisciNuovaImmagine.jpg') }}" style=" background-repeat: no-repeat; background-size: contain; width: 180px; height: 270px;"/>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="single-input-item">
                                <input type="file" id="image3" name="image3"  class="form-control @error('image3') is-invalid @enderror" style="margin-bottom: 5px;">
                                @error('image3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><div class="col-lg-1">
                        </div><div class="col-lg-3">
                            <div class="single-input-item">
                                <input type="file" id="image4" name="image4"  class="form-control @error('image4') is-invalid @enderror" style="margin-bottom: 5px;">
                                @error('image4')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-3"></div>
                    <div class="row">
                        <div class="col-lg-9-5"></div>
                        <div style="margin-right: 2.3%"></div>

                        <div class="col-lg-1">
                            <div class="buttons-back">
                                <a href="{{url('/accountArea/menagementproducts')}}">Indietro</a>
                            </div>
                        </div>
                        <div style="margin-right: 1.3334%"></div>
                        <div class="col-lg-1">
                            <div class="single-input-item">
                                <button type="submit" class="btn btn-sqr">modifica</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3"></div>

                    <div class="mt-3"></div>
                </form>
            </div>
        </div>
    </fieldset>
</div>