<x-admin.form path="/save_new_speaker" button="Add speaker">

    @if (old('country'))
        <option>{{ old('country') }}</option>
    @else
        <option value="" selected disabled hidden>Choose here</option>
    @endif
    <option>United Kingdom</option>
    <option>Germany</option>
    <option>Poland</option>
    <option>United States</option>
    <option>China</option>
    <option>Japan</option>
    <option>Ukraine</option>

</x-admin.form>
