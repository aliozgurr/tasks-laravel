<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css']) <!-- 'resources/js/app.js'  -->

    @stack('css')
</head>
<body>
<div class="min-h-full">
    @include('components.navbar')

    <main>
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</div>

@stack('js')
</body>
</html>
