<div x-show="open" class="fixed inset-0 z-40 flex lg:hidden"
x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
aria-modal="true">

<div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
    class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="open = false" aria-hidden="true">
</div>

<div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300 transform"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
    x-description="Off-canvas menu, show/hide based on off-canvas menu state."
    class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-cyan-700">

    <div x-show="open" x-transition:enter="ease-in-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-description="Close button, show/hide based on off-canvas menu state."
        class="absolute top-0 right-0 pt-2 -mr-12">
        <button type="button"
            class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            @click="open = false">
            <span class="sr-only">Close sidebar</span>
            <svg class="w-6 h-6 text-white" x-description="Heroicon name: outline/x"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <div class="flex items-center flex-shrink-0 px-4">
        <img class="w-auto h-8"
            src="https://tailwindui.com/img/logos/easywire-logo-cyan-300-mark-white-text.svg"
            alt="Easywire logo">
    </div>
    <nav class="flex-shrink-0 h-full mt-5 overflow-y-auto divide-y divide-cyan-800"
        aria-label="Sidebar">
        <div class="px-2 space-y-1">

            <a href="#"
                class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md bg-cyan-800 group"
                x-state:on="Current" x-state:off="Default" aria-current="page"
                x-state-description="Current: &quot;bg-cyan-800 text-white&quot;, Default: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                    x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Home
            </a>

            <a href="#"
                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600 group"
                x-state-description="undefined: &quot;bg-cyan-800 text-white&quot;, undefined: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                    x-description="Heroicon name: outline/clock" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Users
            </a>

            <a href="#"
                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600 group"
                x-state-description="undefined: &quot;bg-cyan-800 text-white&quot;, undefined: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                    x-description="Heroicon name: outline/scale" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                    </path>
                </svg>
                Transactions
            </a>

            <a href="#"
                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600 group"
                x-state-description="undefined: &quot;bg-cyan-800 text-white&quot;, undefined: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                    x-description="Heroicon name: outline/credit-card"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                    </path>
                </svg>
                Withdrawals
            </a>

            <a href="#"
                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600 group"
                x-state-description="undefined: &quot;bg-cyan-800 text-white&quot;, undefined: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                    x-description="Heroicon name: outline/user-group"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Cards
            </a>

            <a href="#"
                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600 group"
                x-state-description="undefined: &quot;bg-cyan-800 text-white&quot;, undefined: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                    x-description="Heroicon name: outline/document-report"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Vouchers
            </a>

        </div>
        <div class="pt-6 mt-6">
            <div class="px-2 space-y-1">

                <a href="#"
                    class="flex items-center px-2 py-2 text-base font-medium rounded-md group text-cyan-100 hover:text-white hover:bg-cyan-600">
                    <svg class="w-6 h-6 mr-4 text-cyan-200" x-description="Heroicon name: outline/cog"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Settings
                </a>

                <a href="#"
                    class="flex items-center px-2 py-2 text-base font-medium rounded-md group text-cyan-100 hover:text-white hover:bg-cyan-600">
                    <svg class="w-6 h-6 mr-4 text-cyan-200"
                        x-description="Heroicon name: outline/question-mark-circle"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    API Docs
                </a>
            </div>
        </div>
    </nav>
</div>

<div class="flex-shrink-0 w-14" aria-hidden="true">
    <!-- Dummy element to force sidebar to shrink to fit close icon -->
</div>
</div>
