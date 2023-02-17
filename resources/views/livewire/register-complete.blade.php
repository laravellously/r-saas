<div class="py-20 mx-auto text-center max-w-7xl">
    <div class="w-full space-y-2">
        <h1 class="mb-5 text-5xl font-medium">Welcome Aboard!</h1>
        <p class="py-0 my-0">Thanks for subscribing and welcome aboard. Please finish completing your profile information
            below.</p>
    </div>
    <div class="flex flex-col justify-center py-10 sm:py-5 sm:px-6 lg:px-8">
        <div class="mt-8 text-left sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white border shadow border-gray-50 sm:rounded-lg sm:px-10">
                <div class="pb-3 sm:border-b sm:border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Profile
                    </h3>
                    <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
                        Finish filling out your profile information.
                    </p>
                </div>

                <form wire:submit.prevent="submit">
                    <div class="mt-6">
                        <div class="mt-1 rounded-md shadow-sm">
                            <x-jet-input type="text" wire:model="name" label="Name" required
                                class="w-full form-input" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="mt-1 rounded-md shadow-sm">
                            <x-jet-input type="password" wire:model="password" label="Password" required
                                class="w-full form-input" />
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center text-sm leading-5">
                        <span class="block w-full mt-5 rounded-md shadow-sm">
                            <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-cyan-600 hover:bg-cyan-500 focus:outline-none focus:border-cyan-700 focus:shadow-outline-cyan active:bg-cyan-700">
                                Submit
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
