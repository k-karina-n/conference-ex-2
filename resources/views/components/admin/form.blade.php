<div class="mt-12 max-w-xl mx-auto text-center">
    <div class="overflow-hidden shadow sm:rounded-md">
        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
            <div class="grid gap-4 lg:gap-6">

                <form hx-post="{{ $path }}" hx-trigger="submit" hx-target="#parent-div" hx-swap="innerHTML"
                    enctype="multipart/form-data">
                    @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <x-admin.form-item for="firstName" label="First Name">
                                <input type="text" name="firstName" id="firstName"
                                    value="{{ $user->firstName ?? '' }}"
                                    class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </x-admin.form-item>

                            <x-admin.form-item for="lastName" label="Last Name">
                                <input type="text" name="lastName" id="lastName" value="{{ $user->lastName ?? '' }}"
                                    class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </x-admin.form-item>

                            <x-admin.form-item for="phone" label="Phone number">
                                <input type="tel" name="phone" id="phone" x-data x-mask="+99 (999) 999-9999"
                                    value="{{ $user->phone ?? '' }}" placeholder="+NN (NNN) NNN-NNNN"
                                    class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </x-admin.form-item>

                            <x-admin.form-item for="email" label="Email">
                                <input type="email" name="email" id="email" value="{{ $user->email ?? '' }}"
                                    placeholder="example@email.com"
                                    class="peer py-3 px-4 block w-full rounded-md border border-gray-200 bg-white py-2 px-3 shadow-sm text-sm hover:border-blue-500 focus:border-indigo-500 focus:ring-indigo-500">
                                <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                    Please provide a valid email address.
                                </p>
                            </x-admin.form-item>
                        </div>

                        <x-admin.form-item for="country" label="Country">
                            <select id="country" name="country" autocomplete="country-name"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 bg-white py-2 px-3 shadow-sm text-sm hover:border-blue-500 focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                                {{ $slot }} {{-- for custom country options --}}
                            </select>
                        </x-admin.form-item>

                        <x-admin.form-item for="file" label="Profile Photo">
                            <input type="file" name="file" id="file"
                                class="block w-full border border-gray-200 shadow-sm rounded-md
                                        text-sm focus:z-10 
                                        hover:border-blue-500
                                        focus:border-blue-500 focus:ring-blue-500 
                                       
                                        file:bg-transparent file:border-0
                                        file:bg-gray-100 file:mr-4
                                        file:py-3 file:px-4
                                       "
                                {{ $path == '/add_speaker' ? 'required' : '' }}>
                        </x-admin.form-item>

                        <x-admin.form-item for="title" label="Conference title">
                            <input id="title" name="title" type="text"
                                value="{{ $user->conference->title ?? '' }}"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Topic">
                        </x-admin.form-item>

                        <x-admin.form-item for="description" label="Conference decription">
                            <textarea id="description" name="description" type="text"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500"
                                rows="3" placeholder="Description (up to 1000 characters)" maxlength="1000">{{ $user->conference->description ?? '' }}</textarea>
                        </x-admin.form-item>

                        <x-admin.form-item for="date" label="Date">
                            @php($date = date('Y-m-d'))
                            <input type="date" name="date" id="date" min="{{ $date }}"
                                value="{{ $user->conference->date ?? '' }}"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500">
                        </x-admin.form-item>

                        <div class="mt-6 grid">
                            <button type="submit"
                                class="py-3 px-4 block w-full rounded-md border rounded-md bg-blue-400 hover:bg-blue-500 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition">
                                {{ $button }}
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
                </form>
            </div>
        </div>
    </div>
</div>
