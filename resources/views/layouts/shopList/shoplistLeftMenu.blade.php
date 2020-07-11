<div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2 mt-sm-50 mt-xs-40">
    <div class="shop-left">
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

        @php
            $text1 = \App\Http\Controllers\ComicController::countByType('shonen');
            $text2 = \App\Http\Controllers\ComicController::countByType('seinen');
            $text3 = \App\Http\Controllers\ComicController::countByType('shojo');
            $text4 = \App\Http\Controllers\ComicController::countByType('josei');
            $text5 = \App\Http\Controllers\ComicController::countByType('dc');
            $text6 = \App\Http\Controllers\ComicController::countByType('marvel');
            $text7 = \App\Http\Controllers\ComicController::countByType('italiano');
            $text8 = \App\Http\Controllers\ComicController::countByType('other');
        @endphp
        <button class="collapsible"><i class="fa fa-angle-down"></i> CATEGORIA</button>
        <div class="content2">
            <div class="left-menu mb-30">
                <ul>
                    <li><a href="{{ url('/shoplist/type/shonen')}}">Shonen<span>({{$text1}})</span></a></li>
                    <li><a href="{{ url('/shoplist/type/seinen')}}">Seinen<span>({{$text2}})</span></a></li>
                    <li><a href="{{ url('/shoplist/type/shojo')}}">Shojo<span>({{$text3}})</span></a></li>
                    <li><a href="{{ url('/shoplist/type/josei')}}">Josei<span>({{$text4}})</span></a></li>
                    <li><a href="{{ url('/shoplist/type/dc')}}">Dc<span>({{$text5}})</span></a></li>
                    <li><a href="{{ url('/shoplist/type/marvel')}}">Marvel<span>({{$text6}})</span></a></li>
                    <li><a href="{{ url('/shoplist/type/italiano')}}">Italiano<span>({{$text7}})</span></a></li>
                    <li><a href="{{ url('/shoplist/type/other')}}">Other<span>({{$text8}})</span></a></li>
                </ul>
            </div>
        </div>
        <button class="collapsible"><i class="fa fa-angle-down"></i> GENERE</button>
        <div class="content2">
            <div class="left-menu mb-30">
                <ul>
                    @foreach($genres as $genre)
                        @php
                            $numOfOcc = App\Http\Controllers\GenreController::countComics($genre->id);
                        @endphp
                        <li><a href= "{{route('genreshoplist',['name_genre' => $genre->name_genre])}}">{{$genre->name_genre}}<span>({{$numOfOcc}})</span></a></li> <!-- Da finire -->

                    @endforeach
                </ul>
            </div>
        </div>
        @php
            $integer1 = \App\Http\Controllers\ComicController::countByPrice(0,4);
            $integer2 = \App\Http\Controllers\ComicController::countByPrice(3.99,8.00);
            $integer3 = \App\Http\Controllers\ComicController::countByPrice(7.99,15);
            $integer4 = \App\Http\Controllers\ComicController::countByPrice(14.99,25);
            $integer5 = \App\Http\Controllers\ComicController::countByPrice(24.99,10000);
            $integer6 = \App\Http\Controllers\ComicController::countByDiscount();
        @endphp
        <div class="mt-1"></div>
        <button class="collapsible"><i class="fa fa-angle-down"></i> PREZZO</button>
        <div class="content2">
            <div class="left-menu mb-30">
                <ul>
                    <li><a href="{{route('sconto')}}">In Sconto<span>({{$integer6}})</span></a></li>
                    <li><a href="{{route('prezzo0')}}">€0.00-€3.99<span>({{$integer1}})</span></a></li>
                    <li><a href="{{route('prezzo1')}}">€4.00-€7.99<span>({{$integer2}})</span></a></li>
                    <li><a href="{{route('prezzo2')}}">€8.00-€14.99<span>({{$integer3}})</span></a></li>
                    <li><a href="{{route('prezzo3')}}">€15.00-€24.99<span>({{$integer4}})</span></a></li>
                    <li><a href="{{route('prezzo4')}}">€25.00 +<span>({{$integer5}})</span></a></li>
                </ul>
            </div>
        </div>
    </div>
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