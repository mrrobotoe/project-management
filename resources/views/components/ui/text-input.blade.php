@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
    'class' => 'h-10 border-border bg-transparent text-foreground focus-visible:border-foreground/70 focus-visible:ring-3 focus-visible:ring-ring/80 rounded-md shadow-xs transition-[color,box-shadow] duration-100 disabled:opacity-50 dark:bg-input/30'
    ]) }}
>
