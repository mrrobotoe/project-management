@props([
    'type' => 'submit',
    'variant' => null
])

@php
    $variantClasses = match($variant) {
        'danger' => 'bg-destructive text-white hover:bg-destructive/80 focus-visible:ring-destructive/80 focus-visible:border-destructive',
        'outline' => 'border border-border shadow-xs hover:bg-input/30 dark:bg-input dark:text-foreground',
        'ghost' => 'hover:bg-input/35 focus-visible:ring-ring/40 dark:bg-foreground/10',
        default => 'bg-primary text-primary-foreground hover:bg-primary/80 focus-visible:ring-ring'
    }
@endphp
<button
    {{ $attributes->merge([
    'type' => $type,
    'class' => 'h-10 inline-flex items-center px-4 py-2 rounded-lg font-medium text-sm capitalize focus-visible:outline-hidden focus-visible:ring-3 transition ease-in-out duration-150 ' . $variantClasses]) }}
>
    {{ $slot }}
</button>
