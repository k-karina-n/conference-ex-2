<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">

                        {{ $slot }}

                    </div>
                </div>


            </div>
        </div>
    </div>
</nav>
