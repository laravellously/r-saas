<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;800&display=swap" rel="stylesheet">
    <style>[x-cloak] { display: none !important; }</style>
    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @powerGridStyles
</head>

<body class="h-full font-sans antialiased">

    <x-notifications />
    <div class="h-[640px] bg-gray-100 overflow-y-auto">
        <div x-data="{ open: false }" @keydown.window.escape="open = false" class="min-h-full">
            @include('layouts._partials._sidebarXs')
            <!-- Static sidebar for desktop -->
            @include('layouts._partials._sidebarLg')
            <div class="flex flex-col flex-1 lg:pl-64">
                @include('layouts._partials._header')
                <main class="flex-1 pb-8">
                    @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    @powerGridScripts
</body>

</html>
