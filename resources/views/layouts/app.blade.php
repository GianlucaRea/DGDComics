<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <header>
        @include('layouts.header')
    </header>
    @php($page = [
    'name' =>'Area Personale']
    )
    @include('layouts.breadcrumbsArea', $page)
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
    @include('layouts.modal')
    @include('layouts.jsImport')
</body>
</html>
