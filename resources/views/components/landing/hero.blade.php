<div class="relative overflow-hidden bg-white">
    <div class="mx-auto max-w-7xl">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <svg class="absolute inset-y-0 right-0 hidden w-48 h-full text-white transform translate-x-1/2 lg:block"
                fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="50,0 100,0 50,100 0,100"></polygon>
            </svg>

            <div class="relative px-4 pt-6 sm:px-6 lg:px-8"></div>

            <main class="px-4 pt-6 mx-auto mt-10 max-w-7xl sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Financial Technology made</span>
                        <!-- space -->
                        <span class="block text-indigo-600 xl:inline">simple, easy and effortless</span>
                    </h1>
                    <p
                        class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Rimplenet&trade; offers a simple, easy-to-use backend for financial technology that makes it
                        easy to handle transfers, payments, cryptocurrency trading, vouchers, and more.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('pricing') }}"
                                class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Get started
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a id="demo"
                                class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md cursor-pointer hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                Live demo
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="object-cover w-full h-56 sm:h-72 md:h-96 lg:w-full lg:h-full"
            src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2850&amp;q=80"
            alt="">
    </div>

    @push('scripts')
        <script>
            let demoBtn = document.getElementById("demo");
            demoBtn.addEventListener('click', function() {
                document.getElementById("fullscreenLoaderMessage").innerText =
                    "Setting Up Demo Account";
                document.getElementById("fullscreenLoader").classList.remove("hidden");
                axios.post("/demo", {
                        _token: csrf
                    })
                    .then(function(response) {
                        queryParams = "?complete=true";
                        window.location = "/checkout/welcome" + queryParams;
                    });
            }, false);
        </script>
    @endpush
</div>
