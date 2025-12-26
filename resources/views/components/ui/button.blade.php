@props([
    'type' => 'submit',
    'variant' => null,
    'size' => null
])

@php
    $variantClasses = match($variant) {
        'danger' => 'bg-destructive text-white hover:bg-destructive/80 focus-visible:ring-destructive/80 focus-visible:border-destructive',
        'outline' => 'border border-border shadow-xs hover:bg-input/30 dark:bg-input dark:text-foreground',
        'ghost' => 'bg-transparent text-foreground hover:bg-input/35 focus-visible:ring-ring/40',
        default => 'bg-primary text-primary-foreground hover:bg-primary/80 focus-visible:ring-ring'
    };

    $sizeClasses = match($size) {
        'icon' => 'size-9',
        'sm' => 'h-8 px-3 rounded-md',
        'lg' => 'h-11 px-5 rounded-md',
        'icon-sm' => 'size-8',
        'icon-lg' => 'size-10',
        default => 'h-9 px-4 py-2 has-[>svg]:px-3'
    };
@endphp
<button
    {{ $attributes->merge([
    'type' => $type,
    'class' => 'inline-flex items-center gap-3 select-none justify-center rounded-lg font-medium text-sm capitalize focus-visible:outline-hidden focus-visible:ring-3 transition ease-in-out duration-150 [&_svg:not([class*=\'size-\'])]:size-4 [&_svg]:pointer-events-none outline-none ' . $sizeClasses . ' ' . $variantClasses]) }}
>
    {{ $slot }}
</button>
