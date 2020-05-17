<!DOCTYPE html>
<html class="no-js" lang="it">
    <head>
        @include('layouts.Header.head')
    </head>
    <body class="home-2">
    <header>
        @include('layouts.Header.header')
    </header>
            @include('layouts.Homepage.featuredArea')
            @include('layouts.Homepage.slider')
            @include('layouts.Homepage.newArrival')
            <div style="height: 75px"></div>
            @include('layouts.Homepage.bestsellerArea')
            @include('layouts.Homepage.dgdrandom')
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
