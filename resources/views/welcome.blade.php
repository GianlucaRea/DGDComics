<!DOCTYPE html>
<html class="no-js" lang="it">
    <head>
        @include('layouts.Header.head')
    </head>
    <body class="home-2">
    <header>
        @include('layouts.Header.header')
    </header>
            @include('layouts.Homepage.slider2')
            @include('layouts.Homepage.newArrival')
            @include('layouts.Homepage.sale')

            @include('layouts.Homepage.consigliati')
            @include('layouts.Footer.banner3')
            @include('layouts.Homepage.productArea')
            @include('layouts.Homepage.recentPostArea')
            @include('layouts.Footer.social')
            <footer>
                @include('layouts.Footer.footer')
            </footer>
            @include('layouts.Footer.modal')
            @include('layouts.Footer.jsImport')
    </body>
</html>
