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
    'name' =>'In lavorazione']
    )

@include('layouts.Header.breadcrumbsArea')

<div class="col-lg-12">
    <div class="section-title text-center pt-50 mb-50">
        <h2>In lavorazione</h2>
        <p>Questa pagina è in mantenimento, ci scusiamo, <br /> Per avere informazioni contattaci.</p>

            <i class="fa fa-mobile"></i>
            <span>Telefono: </span>
            (+39)000 850 4889
            <br/>
            <i class="fa fa-envelope"></i>
            <span>Email: </span>
            DGDcomics@support.com

    </div>
</div>



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