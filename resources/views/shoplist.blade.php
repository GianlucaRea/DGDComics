<!DOCTYPE html>
<html class="no-js" lang="it">
<head>
    @include('layouts.Header.head')
</head>
<body class="home-2">
<header>
    @include('layouts.Header.header')
</header>
@php($page = [
    'name' =>'risultati di ricerca']
    )
@include('layouts.Header.breadcrumbsArea', $page)
<div class="shop-main-area">
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