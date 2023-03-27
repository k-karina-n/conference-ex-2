<x-admin-func path="/update_speaker/{{ $user->id }}" button="Update speaker" :user="$user">

    <div class="mt-2 space-y-2">
        <label for="country" class="block text-sm text-gray-700 font-medium">Country</label>
        <select id="country" name="country"
            class="py-3 px-4 block w-full rounded-md border border-gray-200 bg-white py-2 px-3 shadow-sm text-sm hover:border-blue-500 focus:border-indigo-500 focus:ring-indigo-500"
            required>
            @foreach ($countries as $country)
                <option>{{ $country }}</option>
            @endforeach
        </select>
    </div>

</x-admin-func>
