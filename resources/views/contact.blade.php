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
    'name' =>'Contatti']
    )
@include('layouts.Header.breadcrumbsArea', $page)
@include('layouts.Other.contactForm')
@include('layouts.Footer.social')
<footer>
    @include('layouts.Footer.footer')
</footer>
@include('layouts.Footer.modal')
@include('layouts.Footer.jsImport')
</body>
</html>
