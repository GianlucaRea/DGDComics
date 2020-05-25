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
    'name' =>'il tuo account']
    )
@include('layouts.Header.breadcrumbsArea', $page)
<div style="height: 75px"></div>
@include('layouts.UserAccount.vendorAdd')
<div style="height: 75px"></div>
<footer>
    @include('layouts.Footer.footer')
</footer>
@include('layouts.Footer.modal')
@include('layouts.Footer.jsImport')
</body>
</html>