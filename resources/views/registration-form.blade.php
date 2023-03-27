<x-layout>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Register for Conference Below</h1>
        </div>
    </header>

    <main>
        <iframe class="w-full h-72"
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5355.278733094182!2d35.10579626334702!3d47.84657947458047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sua!4v1671044983268!5m2!1sen!2sua">
        </iframe>

        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="max-w-xl mx-auto">
                <div class="text-center">

                    <div id="parent-div">
                        @include('registrationPartials/register')
                    </div>

                </div>
            </div>
        </div>
    </main>
</x-layout>
