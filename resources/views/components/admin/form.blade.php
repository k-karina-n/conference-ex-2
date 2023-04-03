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
                                value="{{ $user->firstName ?? old('firstName') }}"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500
                                    @error('firstName') border-pink-600 focus:border-pink-500 focus:ring-pink-500 focus:ring-1 @enderror"
                                @error('firstName') autofocus @enderror required>
                            @error('firstName')
                                <p class="flex alert alert-danger mt-2 text-pink-600 text-sm">{{ $message }}</p>
                            @enderror
                        </x-admin.form-item>

                        <x-admin.form-item for="lastName" label="Last Name">
                            <input type="text" name="lastName" id="lastName"
                                value="{{ $user->lastName ?? old('lastName') }}"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500
                                @error('lastName') border-pink-600 focus:border-pink-500 focus:ring-pink-500 focus:ring-1 @enderror"
                                @error('lastName') autofocus @enderror required>
                            @error('lastName')
                                <p class="flex alert alert-danger mt-2 text-pink-600 text-sm">{{ $message }}</p>
                            @enderror
                        </x-admin.form-item>

                        <x-admin.form-item for="phone" label="Phone number">
                            <input type="tel" name="phone" id="phone" x-data x-mask="+99 (999) 999-9999"
                                value="{{ $user->phone ?? old('phone') }}" placeholder="+NN (NNN) NNN-NNNN"
                                class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500
                                @error('phone') border-pink-600 focus:border-pink-500 focus:ring-pink-500 focus:ring-1 @enderror"
                                @error('phone') autofocus @enderror required>
                            @error('phone')
                                <p class="flex alert alert-danger mt-2 text-pink-600 text-sm">{{ $message }}</p>
                            @enderror
                        </x-admin.form-item>

                        <x-admin.form-item for="email" label="Email">
                            <input type="email" name="email" id="email"
                                value="{{ $user->email ?? old('email') }}" placeholder="example@email.com"
                                class="peer py-3 px-4 block w-full rounded-md border border-gray-200 bg-white py-2 px-3 shadow-sm text-sm hover:border-blue-500 focus:border-indigo-500 focus:ring-indigo-500
                                @error('email') border-pink-600 focus:border-pink-500 focus:ring-pink-500 focus:ring-1 @enderror"
                                @error('email') autofocus @enderror>
                            @error('email')
                                <p class="flex alert alert-danger mt-2 text-pink-600 text-sm">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                Please provide a valid email address.
                            </p>
                        </x-admin.form-item>
                    </div>

                    <x-admin.form-item for="country" label="Country">
                        <select id="country" name="country" autocomplete="country-name"
                            class="py-3 px-4 block w-full rounded-md border border-gray-200 bg-white py-2 px-3 shadow-sm text-sm hover:border-blue-500 focus:border-indigo-500 focus:ring-indigo-500
                            @error('country') border-pink-600 focus:border-pink-500 focus:ring-pink-500 focus:ring-1 @enderror"
                            @error('country') autofocus @enderror required>
                            {{ $slot }} {{-- for custom country options --}}
                            @error('country')
                                <p class="flex alert alert-danger mt-2 text-pink-600 text-sm">{{ $message }}</p>
                            @enderror
                        </select>
                    </x-admin.form-item>

                    <x-admin.form-item for="file" {{-- class="{{ $errors->any() ? 'text-pink-700' : '' }}"
                        label="{{ $errors->any() ? 'Upload photo again' : 'Profile photo' }}" --}}
                        @if ($errors->any())
                        label="Upload photo again"
                        @else
                        label="Profile Photo"
                        @endif>
                        <input type="file" name="file" id="file"
                            class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 
                                @error('file') border-pink-600 focus:border-pink-500 focus:ring-pink-500 focus:ring-1 @enderror"
                            @error('file') autofocus @enderror {{ $path == '/add_speaker' ? 'required' : '' }}>
                        @error('file')
                            <p class="flex
                            alert alert-danger mt-2 text-pink-600 text-sm">
                                {{ $message }}</p>
                        @enderror
                    </x-admin.form-item>

                    <x-admin.form-item for="title" label="Conference title">
                        <input id="title" name="title" type="text"
                            value="{{ $user->conference->title ?? old('title') }}" placeholder="Topic"
                            class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500 
                            @error('title') border-pink-600 focus:border-pink-500 focus:ring-pink-500 focus:ring-1 @enderror"
                            @error('title') autofocus @enderror required>
                        @error('title')
                            <p class="flex
                            alert alert-danger mt-2 text-pink-600 text-sm">
                                {{ $message }}</p>
                        @enderror
                    </x-admin.form-item>

                    <x-admin.form-item for="description" label="Conference decription">
                        <textarea id="description" name="description" type="text"
                            class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500 
                            @error('description') border-pink-600 focus:border-pink-500 focus:ring-pink-500 focus:ring-1 @enderror"
                            @error('description') autofocus @enderror required rows="3" placeholder="Description (up to 1000 characters)"
                            maxlength="1000">{{ $user->conference->description ?? old('description') }}</textarea>
                        @error('description')
                            <p class="flex
                            alert alert-danger mt-2 text-pink-600 text-sm">
                                {{ $message }}</p>
                        @enderror
                    </x-admin.form-item>

                    <x-admin.form-item for="date" label="Date">
                        <input type="date" name="date" id="date" min="{{ date('Y-m-d') }}"
                            value="{{ $user->conference->date ?? old('date') }}"
                            class="py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:border-blue-500 focus:ring-blue-500 
                            @error('date') border-pink-600 focus:border-pink-500 focus:ring-pink-500 focus:ring-1 @enderror"
                            @error('date') autofocus @enderror required>
                        @error('date')
                            <p class="flex
                            alert alert-danger mt-2 text-pink-600 text-sm">
                                {{ $message }}</p>
                        @enderror
                    </x-admin.form-item>

                    <div class="mt-6 grid">
                        <button type="submit"
                            class="py-3 px-4 block w-full rounded-md border rounded-md bg-blue-400 hover:bg-blue-500 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition">
                            {{ $button }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
