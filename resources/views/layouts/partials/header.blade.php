<div class="relative bg-white" x-data={show:false}>
    <div class="px-6 mx-auto max-w-7xl">
        <div class="flex items-center justify-between py-6 border-b-2 border-gray-100 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="{{ route('landing') }}">
                    <span class="sr-only">Rimplenet&reg;</span>
                    <img class="w-auto h-8 sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg">
                </a>
            </div>
            <div class="-my-2 -mr-2 md:hidden">
                <button type="button" @click="show = true"
                    class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/bars-3 -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <nav class="hidden space-x-10 md:flex">
                <a href="{{ route('landing') }}"
                    class="text-base font-medium text-gray-500 @if (Request::is('landing')) {{ 'text-gray-900 hover:text-gray-700 focus:text-gray-700' }}@else{{ 'text-gray-500 hover:text-gray-900 focus:text-gray-700' }} @endif hover:text-gray-900">Integrations</a>
                <a href="{{ route('pricing') }}"
                    class="text-base font-medium text-gray-500 hover:text-gray-900">Pricing</a>
                <a href="https://gitbook.com" class="text-base font-medium text-gray-500 hover:text-gray-900">Docs</a>

            </nav>
            <div class="items-center justify-end hidden md:flex md:flex-1 lg:w-0">
                <a href="{{ route('login') }}" class="text-base font-medium text-gray-500 whitespace-nowrap hover:text-gray-900">Sign
                    in</a>
                <a href="{{ route('pricing') }}"
                    class="inline-flex items-center justify-center px-4 py-2 ml-8 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm whitespace-nowrap hover:bg-indigo-700">Get Started</a>
            </div>
        </div>
    </div>

    <!--
      Mobile menu, show/hide based on mobile menu state.

      Entering: "duration-200 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
      Leaving: "duration-100 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->
    <div class="absolute inset-x-0 top-0 p-2 transition origin-top-right transform md:hidden" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" :class="show || 'hidden'" x-show.transition="true">
        <div class="bg-white divide-y-2 rounded-lg shadow-lg divide-gray-50 ring-1 ring-black ring-opacity-5">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="Rimplenet&reg;">
                    </div>
                    <div class="-mr-2">
                        <button type="button" @click="show = false"
                            class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x-mark -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav class="grid gap-y-8">
                        <a href="#" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                              </svg>
                            <span class="ml-3 text-base font-medium text-gray-900">Integrations</span>
                        </a>

                        <a href="{{ route('pricing') }}" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                              </svg>
                            <span class="ml-3 text-base font-medium text-gray-900">Pricing</span>
                        </a>

                        <a href="https://docs.rimplenet.com" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                              </svg>
                            <span class="ml-3 text-base font-medium text-gray-900">Docs</span>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="px-5 py-6 space-y-6">
                <div>
                    <a href="{{ route('pricing') }}"
                        class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700">Get Started</a>
                    <p class="mt-6 text-base font-medium text-center text-gray-500">
                        Existing customer?
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
