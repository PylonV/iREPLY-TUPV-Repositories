<!doctype html>
<html lang="en-US">
    <head>
        <meta view-port="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} @hasSection('title') | @endif @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @livewireStyles
    </head>
    <body>
        <x-header.basic />
        <div class="container">
            @yield('content')
        </div>
        @livewireScripts
    </body>
</html>
