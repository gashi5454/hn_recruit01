@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-01']) }}>
    {{ $value ?? $slot }}
</label>
