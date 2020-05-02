<!DOCTYPE html>
<html class="no-js" lang="it">
<head>
    @include('layouts.head')
</head>
<body class="home-2">
<header>
    @include('layouts.header')
</header>
<div style="height: 75px"></div>
<div class="shop-main-area mb-70">
    <div class="container">
        <div class="row">
            @include('layouts.shoplistLeftMenu')
            @include('layouts.shopListComics')
            @include('layouts.shopListPagination')
        </div>
    </div>
</div>
<footer>
    @include('layouts.footer')
</footer>
@include('layouts.modal')
@include('layouts.jsImport')
</body>
</html>