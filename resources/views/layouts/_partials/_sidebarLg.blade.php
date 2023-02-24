<div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto bg-cyan-700">
        <div class="flex items-center flex-shrink-0 px-4">
            <img class="w-auto h-8" src="{{ asset('rimplenet.png') }}"
                alt="Rimplenet logo">
        </div>
        <nav class="flex flex-col flex-1 mt-5 overflow-y-auto divide-y divide-cyan-800" aria-label="Sidebar">
            <div class="px-2 space-y-1">

                <a href="{{ route('tenant.dashboard', ['tenant' => tenant('id')]) }}"
                    class="flex items-center px-2 py-2 text-sm font-medium leading-6 {{ is_active_nav_class('tail') }} rounded-md group">
                    <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200" x-description="Heroicon name: outline/home"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Home
                </a>

                <a href="{{ route('tenant.users', ['tenant' => tenant('id')]) }}"
                    class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md {{ is_active_nav_class('users') }} group">
                    <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                        x-description="Heroicon name: outline/user-group" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    Users
                </a>

                <a href="{{ route('tenant.transactions', ['tenant' => tenant('id')]) }}"
                    class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md {{ is_active_nav_class('transactions') }} group">
                    <x-icon name="switch-horizontal" class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200" />
                    Transactions
                </a>

                <a href="{{ route('tenant.deposits', ['tenant' => tenant('id')]) }}"
                    class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md {{ is_active_nav_class('deposits') }} group">
                    <x-icon name="save" class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200" />
                    Deposits
                </a>

                <a href="{{ url('/') }}"
                    class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md {{ is_active_nav_class('withdrawals') }} group">
                    <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200" x-description="Heroicon name: outline/scale"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                        </path>
                    </svg>
                    Withdrawals
                </a>

                <a href="{{ url('/') }}"
                    class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md {{ is_active_nav_class('cards') }} group">
                    <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                        x-description="Heroicon name: outline/credit-card" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>
                    </svg>
                    Cards
                </a>

                <a href="{{ url('/') }}"
                    class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md {{ is_active_nav_class('vouchers') }} group">
                    <svg class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                        x-description="Heroicon name: outline/document-report" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Vouchers
                </a>

            </div>
            <div class="pt-6 mt-6">
                <div class="px-2 space-y-1">

                    <a href="{{ route('tenant.settings', ['tenant' => tenant('id')]) }}"
                        class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md {{ is_active_nav_class('settings') }} group">
                        <svg class="w-6 h-6 mr-4 text-cyan-200" x-description="Heroicon name: outline/cog"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Settings
                    </a>

                    <a href="{{ url('/') }}"
                        class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md group text-cyan-100 hover:text-white hover:bg-cyan-600">
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
</div>
