<x-admin.form path="/update_speaker/{{ $user->id }}" button="Update speaker" :user="$user">

    @foreach ($countries as $country)
        <option>{{ $country }}</option>
    @endforeach

</x-admin.form>
