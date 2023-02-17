<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full antialiased">
    <div class="h-0 min-h-[678px] bg-white">
        <div class="flex flex-col min-h-full bg-white lg:relative">
            <div class="flex flex-col flex-grow">
                <main class="flex flex-col flex-grow bg-white">
                    <div class="flex flex-col flex-grow w-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="flex-shrink-0 pt-10 sm:pt-16">
                            <a href="/" class="inline-flex">
                                <span class="sr-only">Rimplenet SAAS</span>
                                <img class="w-auto h-12"
                                    src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&amp;shade=600"
                                    alt="">
                            </a>
                        </div>
                        <div class="flex-shrink-0 py-16 my-auto sm:py-32">
                            {{-- <p class="text-sm font-semibold tracking-wide text-indigo-600 uppercase">@yield('code') error</p> --}}
                            <h1 class="mt-2 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                                @yield('code')</h1>
                            <p class="mt-2 text-base text-gray-500"> @yield('message') </p>
                            <div class="mt-6">
                                <a href="{{ route('landing') }}"
                                    class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go back
                                    home<span aria-hidden="true"> →</span></a>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="flex-shrink-0 bg-gray-50">
                    <div class="w-full px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <nav class="flex space-x-4">
                            <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-600">Contact
                                Support</a>
                            <span class="inline-block border-l border-gray-300" aria-hidden="true"></span>
                            <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-600">Status</a>
                            <span class="inline-block border-l border-gray-300" aria-hidden="true"></span>
                            <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-600">Twitter</a>
                        </nav>
                    </div>
                </footer>
            </div>
            <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="absolute inset-0 object-cover w-full h-full"
                    src="https://images.unsplash.com/photo-1470847355775-e0e3c35a9a2c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1825&amp;q=80"
                    alt="">
            </div>
        </div>

    </div>
</body>

</html>
