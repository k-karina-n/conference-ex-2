<div class="mt-2 space-y-2">
    <label {{ $attributes->merge(['class' => 'flex text-sm text-gray-700 font-medium']) }}>{{ $label }}</label>
    {{ $slot }}
</div>
