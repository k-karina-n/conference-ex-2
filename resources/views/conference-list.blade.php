@include('partials/head')
@include('partials/navigation')

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Check all speakers below</h1>
    </div>
</header>

<main>

    <div class="px-6 py-4 md:flex justify-center border-t border-gray-200">
        <button hx-get="/conferenceList" hx-trigger="click" hx-target="#parent-div" hx-swap="innerHTML">
            {{ $conferences->links() }}
        </button>
    </div>

    <div id="parent-div">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Photo</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Conference</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($conferences as $conference)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            <img src="{{ asset('/userPhotos/'.$conference->user->photo) }}" id="photo" alt="photo" class="inline-block h-[2.875rem] w-[2.875rem] rounded-md ring-2 ring-white">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 р">
                                            {{ $conference->user->firstName }} {{ $conference->user->lastName }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $conference->title }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $conference->date }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>

</main>

@include('partials/footer')
