<x-layout>
    <main id="parent-div" hx-boost="true">

        <div class="px-6 py-4 flex justify-center border-t border-gray-200">
            {{ $conferences->links() }}
        </div>

        <!-- Table Section -->
        <div class="max-w-[85rem] px-4 mx-auto">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div
                            class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                            <!-- Header -->
                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                <h2 class="text-xl font-semibold text-gray-800">
                                    Check Speakers Below
                                </h2>
                                @auth
                                    <div class="inline-flex gap-x-2">
                                        <button hx-get="/add_speaker" hx-trigger="click" hx-target="#parent-div"
                                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                            Add Speaker
                                        </button>
                                    </div>
                                @endauth
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-table.head-item item="Photo" />
                                        <x-table.head-item item="Name" />
                                        <x-table.head-item item="Conference Title" />
                                        <x-table.head-item item="Date" />
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($conferences as $conference)
                                        <tr>
                                            <x-table.body-item>
                                                <img src="{{ asset('/userPhotos/' . $conference->user->photo) }}"
                                                    id="photo" alt="photo"
                                                    class="inline-block h-[2.875rem] w-[2.875rem] rounded-md ring-2 ring-white">
                                            </x-table.body-item>

                                            <x-table.body-item>
                                                <span class="text-sm text-gray-800 font-semibold">
                                                    {{ $conference->user->firstName }}
                                                    {{ $conference->user->lastName }}
                                                </span>
                                            </x-table.body-item>

                                            <x-table.body-item>
                                                <span class="text-sm text-gray-800 font-semibold">
                                                    {{ $conference->title }}
                                                </span>
                                            </x-table.body-item>

                                            <x-table.body-item>
                                                <span class="text-sm text-gray-500">
                                                    {{ $conference->date }}
                                                </span>
                                            </x-table.body-item>

                                            @auth
                                                @php($id = $conference->user->id)
                                                <x-table.body-item>
                                                    <button hx-get="/edit_speaker/{{ $id }}"
                                                        hx-target="#parent-div"
                                                        class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium">
                                                        Edit
                                                    </button>
                                                </x-table.body-item>

                                                <x-table.body-item>
                                                    <x-modal-delete path="/delete_speaker/{{ $id }}">
                                                        <x-slot name="trigger">
                                                            <button @click="on = true"
                                                                class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium">
                                                                Delete
                                                            </button>
                                                        </x-slot>
                                                    </x-modal-delete>
                                                </x-table.body-item>
                                            @endauth
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash message to inform about admin functions -->
        <x-flash />

    </main>

</x-layout>
