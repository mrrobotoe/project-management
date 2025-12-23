@props([
    'type' => 'submit',
    'variant' => null
])

@php
    $variantClasses = match($variant) {
        'danger' => 'bg-destructive text-destructive-foreground hover:bg-destructive/80 focus-visible:ring-destructive/80',
        default => 'bg-primary text-primary-foreground hover:bg-primary/80 focus-visible:ring-ring'
    }
@endphp
<button
    {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'h-10 inline-flex items-center px-4 py-2 border border-transparent rounded-lg font-medium text-sm capitalize focus-visible:outline-hidden focus-visible:ring-3 focus-visible:ring-offset-2 transition ease-in-out duration-150 ' . $variantClasses]) }}
>
    {{ $slot }}
</button>
