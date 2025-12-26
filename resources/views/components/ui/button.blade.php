@props([
    'type' => 'submit',
    'variant' => null,
    'size' => null
])

@php
    $variantClasses = match($variant) {
        'danger' => 'bg-destructive text-white hover:bg-destructive/80 focus-visible:ring-destructive/80 focus-visible:border-destructive',
        'outline' => 'border border-border shadow-xs hover:bg-input/30 dark:bg-input dark:text-foreground',
        'ghost' => 'text-foreground hover:bg-input/35 focus-visible:ring-ring/40 dark:bg-foreground/10',
        default => 'bg-primary text-primary-foreground hover:bg-primary/80 focus-visible:ring-ring'
    };

    $sizeClasses = match($size) {
        'icon' => 'h-8 w-8 rounded-md p-1',
        'sm' => 'h-9 px-3 rounded-md',
        'lg' => 'h-11 px-5 rounded-lg',
        default => 'h-10 px-4 '
    };
@endphp
<button
    {{ $attributes->merge([
    'type' => $type,
    'class' => 'inline-flex items-center select-none justify-center rounded-lg font-medium text-sm capitalize focus-visible:outline-hidden focus-visible:ring-3 transition ease-in-out duration-150 [&_svg]:size-4 ' . $sizeClasses . ' ' . $variantClasses]) }}
>
    {{ $slot }}
</button>
