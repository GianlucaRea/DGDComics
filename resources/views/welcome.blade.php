<!DOCTYPE html>
<html class="no-js" lang="it">
    <head>
        @include('layouts.Header.head')
    </head>
    <body class="home-2" style="background-image: url({{asset('img/immaginiNostre/prova.png')}}); background-size: cover; background-repeat: no-repeat; background-color: #ffffe6;">
    <header>
        @include('layouts.Header.header')
    </header>
            @include('layouts.Homepage.newArrival')
            @include('layouts.Homepage.slider')
            @include('layouts.Homepage.sale')
            <div style="height: 75px"></div>

            @include('layouts.Homepage.consigliati')
            @include('layouts.Homepage.productArea')
            @include('layouts.Homepage.recentPostArea')
            @include('layouts.Footer.banner2')
            @include('layouts.Footer.social')
            <footer>
                @include('layouts.Footer.footer')
            </footer>
            @include('layouts.Footer.modal')
            @include('layouts.Footer.jsImport')
    </body>
</html>
