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
    'name' =>$comic->comic_name]
    )
@include('layouts.Header.breadcrumbsArea', $page)
@include('layouts.Product.productMainArea')
@include('layouts.Product.productInfo')
@include('layouts.Product.review')
<br><br>
@include('layouts.Footer.banner2')
@include('layouts.Footer.social')
<footer>
    @include('layouts.Footer.footer')
</footer>
@include('layouts.Footer.modal')
@include('layouts.Footer.jsImport')
</body>
</html>