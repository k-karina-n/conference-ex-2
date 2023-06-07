<div class="bg-gray-100 flex h-full items-center py-16">
    <main class="w-full max-w-md mx-auto p-6">
        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl text-center font-bold text-gray-800">{{ $header }}</h1>
                </div>

                <div class="mt-5">
                    <form method="POST" action="{{ $action }}">
                        @csrf
                        <div class="grid gap-y-4">

                            {{ $slot }} {{-- form body for 'log in' option --}}

                            <button type="submit"
                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                {{ $button }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
</div>
