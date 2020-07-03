<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.Header.head')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <header>
        @include('layouts.Header.header')
    </header>
    @php($page = [
    'name' =>'Area personale']
    )
    @include('layouts.Header.breadcrumbsArea', $page)
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        @include('layouts.Footer.footer')
    </footer>
    @include('layouts.Footer.modal')
    @include('layouts.Footer.jsImport')
</body>
</html>
