<a
    {{ $attributes->merge(['class' => "block flex gap-2 items-center w-full px-2 py-1.5 text-sm rounded-md text-foreground hover:bg-input/40 dark:hover:bg-input/50"]) }}
>
    {{ $slot }}
</a>
