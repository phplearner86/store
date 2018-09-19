<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.top._head')
</head>
<body>
    <div id="app">

        @include('partials.top._nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('partials.bottom._scripts')
</body>
</html>
