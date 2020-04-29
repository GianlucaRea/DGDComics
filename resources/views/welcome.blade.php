<!DOCTYPE html>
<html class="no-js" lang="it">
    <head>
        @include('layouts.head')
    </head>
    <body class="home-2">
    <header>
        @include('layouts.header')
    </header>
            @include('layouts.featuredArea')
            @include('layouts.slider')
            @include('layouts.newArrival')
            <div style="height: 75px"></div>
            @include('layouts.bestsellerArea')
            @include('layouts.dgdrandom')
            @include('layouts.productArea')
            @include('layouts.recentPostArea')
            @include('layouts.banner2')
            @include('layouts.social')
            <footer>
                @include('layouts.footer')
            </footer>
            @include('layouts.modal')
            @include('layouts.jsImport')
    </body>
</html>
