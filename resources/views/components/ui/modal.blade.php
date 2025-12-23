@props([
    'isOpen',
    $name = '',
    'header',
    'close'
])


<dialog closedby="any" x-cloak x-data {{ $attributes->merge([
    'class' => 'group invisible overflow-clip open:visible! bg-neutral-950/40 grid place-items-center h-full w-full inset-0 max-w-none max-h-none'
]) }}
    {{ $isOpen ? "open" : "" }}
>
    <div class="bg-background border border-border shadow-md w-full sm:rounded-lg p-6 sm:min-w-md max-w-xl -translate-y-2 opacity-0 scale-95 group-open:translate-y-0 group-open:opacity-100 group-open:scale-100 transition-all duration-150 dark:bg-neutral-900">
        <div class="flex flex-col space-y-1">
            @if(!$header->isEmpty())
                <h2 class="text-lg font-semibold text-foreground">
                    {{ $header }}
                </h2>
            @endif
            {{ $slot }}
        </div>

        @isset($close)
            {{ $close }}
        @endisset
    </div>
</dialog>
