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
    'name' =>'Info Venditore']
    )
@include('layouts.Header.breadcrumbsArea', $page)
@include('layouts.UserAccount.VendorpublicDetail')
<div style="height: 75px"></div>
<footer>
    @include('layouts.Footer.footer')
</footer>
@include('layouts.Footer.modal')
@include('layouts.Footer.jsImport')
</body>