@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-foreground/80']) }}>
    {{ $value ?? $slot }}
</label>
