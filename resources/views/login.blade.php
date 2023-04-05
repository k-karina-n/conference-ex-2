<x-layout>
    <x-admin.access header="Get Admin Access" action="/login" button="Activate this super mode">

        <div>
            <label for="email" class="block text-sm mb-2">Email address</label>
            <div class="relative">
                <input type="email" id="email" name="email"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500"
                    required aria-describedby="email-error">
                <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                    <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16" aria-hidden="true">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                </div>
            </div>
            @error('email')
                <p class="text-xs text-red-600 mt-2">Please indicate a valid email address</p>
            @enderror
        </div>

        <div>
            <div class="flex justify-between items-center">
                <label for="password" class="block text-sm mb-2">Password</label>
            </div>
            <div class="relative">
                <input type="password" id="password" name="password"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500"
                    required aria-describedby="password-error">
                <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                    <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16" aria-hidden="true">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                </div>
            </div>
            @error('password')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

    </x-admin.access>
</x-layout>
