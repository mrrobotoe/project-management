@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
    'class' => 'h-10 border-border bg-transparent text-foreground focus:border-foreground/70 dark:focus:border-foreground focus:ring-3 focus:ring-ring/80 dark:focus:ring-ring rounded-md shadow-xs transition-[color,box-shadow] duration-100'
    ]) }}
>
