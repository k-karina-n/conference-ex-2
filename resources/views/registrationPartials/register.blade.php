<x-registration-layout header="Want to participate?" paragraph="Fill in the conference registration form">
    <form hx-post="/" hx-trigger="submit" hx-target="#parent-div" hx-swap="innerHTML" enctype="multipart/form-data">
        @csrf
        <div x-data="{
            form: {
                firstName: $persist(''),
                lastName: $persist(''),
                phone: $persist(''),
                email: $persist(''),
                country: $persist(''),
        
                title: $persist(''),
                description: $persist(''),
                date: $persist(''),
            }
        }">
            <div x-data="{ currentStep: $persist('first') }">
                <div x-show="currentStep === 'first'" x-transition:enter="transition duration-200 transform ease-out"
                    x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
                    x-transition:leave-end="opacity-0 scale-90">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                        <div class="mt-2 space-y-2">
                            <label for="firstName" class="block text-sm text-gray-700 font-medium">First
                                Name</label>
                            <input type="text" name="firstName" id="firstName" x-model="form.firstName"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="mt-2 space-y-2">
                            <label for="lastName" class="block text-sm text-gray-700 font-medium">Last
                                Name</label>
                            <input type="text" name="lastName" id="lastName" x-model="form.lastName"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="mt-2 space-y-2">
                            <label for="phone" class="block text-sm text-gray-700 font-medium">Phone
                                number</label>
                            <input type="tel" name="phone" id="phone" x-model="form.phone" x-data
                                x-mask="+99 (999) 999-9999" placeholder="+NN (NNN) NNN-NNNN"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="mt-2 space-y-2">
                            <label for="email" class="block text-sm text-gray-700 font-medium">Email</label>
                            <input type="email" name="email" id="email" x-model="form.email"
                                placeholder="example@email.com"
                                class="peer py-3 px-4 block w-full rounded-md border border-gray-200 bg-white py-2 px-3 shadow-sm text-sm hover:border-blue-500 focus:border-indigo-500 focus:ring-indigo-500">
                            <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                Please provide a valid email address.
                            </p>
                        </div>
                    </div>

                    <div class="mt-2 space-y-2">
                        <label for="country" class="block text-sm text-gray-700 font-medium">Country</label>
                        <select id="country" name="country" autocomplete="country-name" x-model="form.country"
                            class="py-3 px-4 block w-full rounded-md border border-gray-200 bg-white py-2 px-3 shadow-sm text-sm hover:border-blue-500 focus:border-indigo-500 focus:ring-indigo-500">
                            <option>United Kingdom</option>
                            <option>Germany</option>
                            <option>Poland</option>
                            <option>United States</option>
                            <option>China</option>
                            <option>Japan</option>
                            <option>Ukraine</option>
                        </select>

                    </div>

                    <div class="mt-6 grid">
                        <button type="button" @click="currentStep = 'second'"
                            class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
                            <div>
                                <span>Next step</span>
                            </div>
                        </button>
                    </div>
                </div>

                <div x-show="currentStep === 'second'" x-transition:enter="transition duration-200 transform ease-out"
                    x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
                    x-transition:leave-end="opacity-0 scale-90">

                    <div class="mt-2 space-y-2">
                        <label class="block text-sm text-gray-700 font-medium">Profile Photo</label>
                        <label for="file" class="sr-only">Choose file</label>
                        <input type="file" name="file" id="file"
                            class="block w-full border border-gray-200 shadow-sm rounded-md
                                        text-sm focus:z-10 
                                        hover:border-blue-500
                                        focus:border-blue-500 focus:ring-blue-500 
                                       
                                        file:bg-transparent file:border-0
                                        file:bg-gray-100 file:mr-4
                                        file:py-3 file:px-4
                                       "
                            required>
                    </div>

                    <div class="mt-2 space-y-2">
                        <label for="title" class="block text-sm text-gray-700 font-medium">Conference
                            title</label>
                        <div class="mt-2 space-y-2">
                            <input id="title" name="title" type="text" x-model="form.title"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Topic" required>
                        </div>
                    </div>

                    <div class="mt-2 space-y-2">
                        <label for="description" class="block text-sm text-gray-700 font-medium">Conference
                            decription</label>
                        <div class="mt-2 space-y-2">
                            <textarea id="description" name="description" type="text" x-model="form.description"
                                class="py-3 px-4 block w-full rounded-md border border-grcharactersay-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500"
                                rows="3" placeholder="Description (up to 1000 characters)" maxlength="1000" required></textarea>
                        </div>
                    </div>

                    <div class="mt-2 space-y-2">
                        <label for="date" class="block text-sm text-gray-700 font-medium">Date</label>
                        <div class="mt-2 space-y-2">
                            @php($date = date('Y-m-d'))
                            <input type="date" name="date" id="date" x-model="form.date"
                                min="{{ $date }}"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                    </div>

                    <div class="mt-6 grid">
                        <button type="button" @click="currentStep = 'first'"
                            class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
                            <span>Previous Step</span>
                        </button>
                    </div>

                    <div class="mt-6 grid">
                        <button type="submit"
                            class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
                            <span>Submit</span>
                        </button>
                    </div>

                    @if ($errors->any())
                        <div class="text-red-500 text-m mt-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </form>
</x-registration-layout>
