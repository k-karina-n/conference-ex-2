<h1 class="text-3xl font-bold text-gray-800 sm:text-4xl">
    {{ $header }}
</h1>
<p class="mt-1 text-gray-600">
    {{ $paragraph }}
</p>

<div class="mt-12">
    <div class="mt-5 md:col-span-2 md:mt-0">
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                <div class="grid gap-4 lg:gap-6">
                {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
