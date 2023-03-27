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
                            class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">

                            <!-- Header -->
                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                    Check Speakers Below
                                </h2>
                                @auth
                                    <div class="inline-flex gap-x-2">
                                        <button hx-get="/add_speaker" hx-trigger="click" hx-target="#parent-div"
                                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
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
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-slate-800">
                                    <tr>
                                        <th scope="col" class="pl-6 py-3 text-left">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Photo
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Name
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Conference title
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Date
                                                </span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right"></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($conferences as $conference)
                                        <tr>
                                            <td class="h-px w-px whitespace-nowrap">
                                                <div class="pl-6 py-3">
                                                    <img src="{{ asset('/userPhotos/' . $conference->user->photo) }}"
                                                        id="photo" alt="photo"
                                                        class="inline-block h-[2.875rem] w-[2.875rem] rounded-md ring-2 ring-white">
                                                </div>
                                            </td>

                                            <td class="h-px w-px whitespace-nowrap">
                                                <div class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3">
                                                    <div class="flex items-center gap-x-3">
                                                        <div class="grow">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                                {{ $conference->user->firstName }}
                                                                {{ $conference->user->lastName }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="h-px w-72 whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                        {{ $conference->title }}
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="h-px w-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-500">
                                                        {{ $conference->date }}
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="h-px w-px whitespace-nowrap"></td>

                                            @auth
                                                @php($id = $conference->user->id)
                                                <td class="h-px w-px whitespace-nowrap">
                                                    <div class="px-6 py-1.5">
                                                        <button hx-get="/edit_speaker/{{ $id }}"
                                                            hx-target="#parent-div"
                                                            class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </td>

                                                <td class="h-px w-px whitespace-nowrap">
                                                    <div class="px-6 py-1.5">
                                                        <x-modal-delete :id=$id>
                                                            <x-slot name="trigger">
                                                                <button @click="on = true"
                                                                    class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium">
                                                                    Delete
                                                                </button>
                                                            </x-slot>
                                                        </x-modal-delete>
                                                    </div>
                                                </td>
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
