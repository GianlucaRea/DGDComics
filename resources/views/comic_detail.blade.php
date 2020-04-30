<!DOCTYPE html>
<html class="no-js" lang="it">
<head>
    @include('layouts.head')
</head>
<body class="home-2">
<header>
    @include('layouts.header')
</header>
@php($page = [
    'name' =>'Dettagli Prodotto']
    )
@include('layouts.breadcrumbsArea', $page)
@include('layouts.productMainArea')
@include('layouts.productInfo')
@include('layouts.review')
<br><br>
@include('layouts.banner2')
@include('layouts.social')
<footer>
    @include('layouts.footer')
</footer>
@include('layouts.modal')
@include('layouts.jsImport')
</body>
</html>