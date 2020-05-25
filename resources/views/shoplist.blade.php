<!DOCTYPE html>
<html class="no-js" lang="it">
<head>
    @include('layouts.Header.head')
</head>
<body class="home-2">
<header>
    @include('layouts.Header.header')
</header>
<div style="height: 75px"></div>
<div class="shop-main-area mb-70">
    <div class="container">
        <div class="row">
            @include('layouts.shopList.shoplistLeftMenu')
            @include('layouts.shopList.shopListComics')
            @include('layouts.shopList.shopListPagination')
        </div>
    </div>
</div>
<footer>
    @include('layouts.Footer.footer')
</footer>
@include('layouts.Footer.modal')
@include('layouts.Footer.jsImport')
</body>
</html>