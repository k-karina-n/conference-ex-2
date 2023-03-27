<h1 class="text-3xl font-bold text-gray-800 sm:text-4xl">
    Congratulations with registration!
</h1>

<p class="mt-1 text-gray-600">
    Share it on social media if you want
</p>

<div class="mt-12">
    <div class="mt-5 md:col-span-2 md:mt-0">
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                <div class="grid gap-4 lg:gap-6">

                    <div class="mt-2 space-y-2">
                        <p class="block text-sm text-gray-700 font-medium">
                            @php($message = "Hey, I'm speaking on '{$title}'! To know more about it, visit")

                            {{ $message }} <a href="http://localhost:8888/list"
                                class="font-medium text-blue-600 hover:underline">conference.com</a>
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div class="mt-2 space-y-2 inline-flex">
                                <a href="http://twitter.com/share?text={{ $message }}&hashtags=conference,speaker,mypublicspeech"
                                    target="_blank"
                                    class="py-3 px-4 block w-full rounded-md border rounded-md bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition">Twitter</a>
                            </div>

                            <div class="mt-2 space-y-2 inline-flex">
                                <a href="http://www.facebook.com/sharer.php?u=http://localhost:8888/list{{ $message }}"
                                    target="_blank"
                                    class="py-3 px-4 block w-full rounded-md border rounded-md bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition">Facebook</a>
                            </div>
                        </div>

                    </div>
                </div>

                <form action="/conference_list" method="GET">
                    <div class="mt-2 space-y-2">
                        <div class="mt-6 grid">
                            <button type="submit"
                                class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">View
                                the list of speakers</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
