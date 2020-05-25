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
    'name' =>'Il tuo account']
    )
@include('layouts.breadcrumbsArea', $page)
<div style="height: 75px"></div>
@include('layouts.vendorAdd')
<div style="height: 75px"></div>
<footer>
    @include('layouts.footer')
</footer>
@include('layouts.modal')
@include('layouts.jsImport')
</body>
</html>
