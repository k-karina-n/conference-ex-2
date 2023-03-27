<x-admin-func path="/add_speaker" button="Add speaker">

    <div class="mt-2 space-y-2">
        <label for="country" class="block text-sm text-gray-700 font-medium">Country</label>
        <select id="country" name="country" autocomplete="country-name"
            class="py-3 px-4 block w-full rounded-md border border-gray-200 bg-white py-2 px-3 shadow-sm text-sm hover:border-blue-500 focus:border-indigo-500 focus:ring-indigo-500">
            <option value="" selected disabled hidden>Choose here</option>
            <option>United Kingdom</option>
            <option>Germany</option>
            <option>Poland</option>
            <option>United States</option>
            <option>China</option>
            <option>Japan</option>
            <option>Ukraine</option>
        </select>
    </div>

</x-admin-func>
