<x-guest-layout>
    <div class="bg-white" x-data={annual:false}>
        <div class="px-4 py-24 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="sm:flex sm:flex-col sm:align-center">
                <h1 class="text-5xl font-extrabold text-gray-900 sm:text-center">Pricing Plans</h1>
                <p class="mt-5 text-xl text-gray-500 sm:text-center">Start building for free, then add a site plan to go
                    live. Account plans unlock additional features.</p>
                <div class="relative self-center mt-6 bg-gray-100 rounded-lg p-0.5 flex sm:mt-8">
                    <button type="button" :class="annual == false ? 'text-gray-900 bg-white border-gray-200 shadow-sm' : 'border border-transparent text-gray-500'" @click="annual = false"
                        class="relative w-1/2 py-2 text-sm font-medium transition rounded-md whitespace-nowrap focus:outline-none focus:z-10 sm:w-auto sm:px-8">Monthly
                        billing</button>
                    <button type="button" @click="annual = true" :class="annual == true ? 'text-gray-900 bg-white border-gray-200 shadow-sm' : 'border border-transparent text-gray-500'"
                        class="ml-0.5 relative w-1/2 transition rounded-md py-2 text-sm font-medium whitespace-nowrap focus:outline-none focus:z-10 sm:w-auto sm:px-8">Yearly
                        billing</button>
                </div>
            </div>
            <div
                class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-4">

                <div class="border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
                    <div class="p-6">
                        <h2 class="text-lg font-medium leading-6 text-gray-900">Hobby</h2>
                        <p class="mt-4 text-sm text-gray-500">All the basics for starting a new business</p>
                        <p class="mt-8">
                            <span class="text-4xl font-extrabold text-gray-900" x-text="annual ? '$50' : '$5'"></span>
                            <span class="text-base font-medium text-gray-500" x-text="annual ? '/yr' : '/mo'"></span>
                        </p>
                        <a data-plan="42959"
                            class="block w-full py-2 checkout cursor-pointer mt-8 text-sm font-semibold text-center text-white bg-gray-800 border border-gray-800 rounded-md hover:bg-gray-900">Buy
                            Hobby</a>
                    </div>
                    <div class="px-6 pt-6 pb-8">
                        <h3 class="text-xs font-medium tracking-wide text-gray-900 uppercase">What's included</h3>
                        <ul role="list" class="mt-6 space-y-4">

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc.</span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Orci neque eget pellentesque.</span>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
                    <div class="p-6">
                        <h2 class="text-lg font-medium leading-6 text-gray-900">Freelancer</h2>
                        <p class="mt-4 text-sm text-gray-500">All the basics for starting a new business</p>
                        <p class="mt-8">
                            <span class="text-4xl font-extrabold text-gray-900" x-text="annual ? '$200' : '$24'"></span>
                            <span class="text-base font-medium text-gray-500" x-text="annual ? '/yr' : '/mo'"></span>
                        </p>
                        <div
                            class="block w-full py-2 mt-8 text-sm font-semibold text-center text-white bg-gray-800 border border-gray-800 rounded-md cursor-pointer hover:bg-gray-900">Buy
                            Freelancer</div>
                    </div>
                    <div class="px-6 pt-6 pb-8">
                        <h3 class="text-xs font-medium tracking-wide text-gray-900 uppercase">What's included</h3>
                        <ul role="list" class="mt-6 space-y-4">

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc. </span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Orci neque eget pellentesque.</span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Donec mauris sit in eu tincidunt etiam.</span>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
                    <div class="p-6">
                        <h2 class="text-lg font-medium leading-6 text-gray-900">Startup</h2>
                        <p class="mt-4 text-sm text-gray-500">All the basics for starting a new business</p>
                        <p class="mt-8">
                            <span class="text-4xl font-extrabold text-gray-900" x-text="annual ? '$350' : '$30'"></span>
                            <span class="text-base font-medium text-gray-500" x-text="annual ? '/yr' : '/mo'"></span>
                        </p>
                        <a
                            class="block w-full py-2 mt-8 text-sm font-semibold text-center text-white bg-gray-800 border border-gray-800 rounded-md hover:bg-gray-900">Buy
                            Startup</a>
                    </div>
                    <div class="px-6 pt-6 pb-8">
                        <h3 class="text-xs font-medium tracking-wide text-gray-900 uppercase">What's included</h3>
                        <ul role="list" class="mt-6 space-y-4">

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc. </span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Orci neque eget pellentesque.</span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Donec mauris sit in eu tincidunt etiam.</span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Faucibus volutpat magna.</span>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
                    <div class="p-6">
                        <h2 class="text-lg font-medium leading-6 text-gray-900">Enterprise</h2>
                        <p class="mt-4 text-sm text-gray-500">All the basics for starting a new business</p>
                        <p class="mt-8">
                            <span class="text-4xl font-extrabold text-gray-900" x-text="annual ? '$700' : '$80'"></span>
                            <span class="text-base font-medium text-gray-500" x-text="annual ? '/yr' : '/mo'"></span>
                        </p>
                        <a href="#"
                            class="block w-full py-2 mt-8 text-sm font-semibold text-center text-white bg-gray-800 border border-gray-800 rounded-md hover:bg-gray-900">Buy
                            Enterprise</a>
                    </div>
                    <div class="px-6 pt-6 pb-8">
                        <h3 class="text-xs font-medium tracking-wide text-gray-900 uppercase">What's included</h3>
                        <ul role="list" class="mt-6 space-y-4">

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc. </span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Orci neque eget pellentesque.</span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Donec mauris sit in eu tincidunt etiam.</span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Faucibus volutpat magna.</span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Id sed tellus in varius quisque.</span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Risus egestas faucibus.</span>
                            </li>

                            <li class="flex space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500"
                                    x-description="Heroicon name: solid/check" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-500">Risus cursus ullamcorper.</span>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <x-landing.faq />
    <x-landing.cta />
    @push('scripts')
<script src="https://cdn.paddle.com/paddle/paddle.js"></script>
<script>

    window.vendor_id = parseInt('{{ config("paddle.vendor") }}');

    if(vendor_id){
        Paddle.Setup({ vendor: vendor_id });
    }

    if("{{ config('paddle.env') }}" == 'sandbox') {
        Paddle.Environment.set('sandbox');
    }

    let checkoutBtns = document.getElementsByClassName("checkout");
    for( var i=0; i < checkoutBtns.length; i++ ){
        checkoutBtns[i].addEventListener('click', function(){
            waveCheckout(this.dataset.plan)
        }, false);
    }

    let updateBtns = document.getElementsByClassName("checkout-update");
    for( var i=0; i < updateBtns.length; i++ ){
        updateBtns[i].addEventListener('click', waveUpdate, false);
    }

    let cancelBtns = document.getElementsByClassName("checkout-cancel");
    for( var i=0; i < cancelBtns.length; i++ ){
        cancelBtns[i].addEventListener('click', waveCancel, false);
    }


    function waveCheckout(plan_id) {
        if(vendor_id){
            let product = parseInt(plan_id);
            Paddle.Checkout.open({
                product: product,
                email: '@if(!auth()->guest()){{ auth()->user()->email }}@endif',
                successCallback: "checkoutComplete",
            });
        } else {
            window.$wireui.notify({
                title: 'Error!',
                description: 'Paddle Vendor ID is not set, please see the docs and learn how to setup billing.',
                icon: 'error'
            })
        }
    }

    function waveUpdate(){
        Paddle.Checkout.open({
            override: this.dataset.url,
            successCallback: "checkoutUpdate",
        });
    }

    function waveCancel(){
        Paddle.Checkout.open({
            override: this.dataset.url,
            successCallback: "checkoutCancel",
        });
    }

</script>
@endpush
</x-guest-layout>



