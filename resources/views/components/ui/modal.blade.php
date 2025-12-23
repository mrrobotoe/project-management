@props([
    $name = '',
])

<dialog x-data {{ $attributes->merge([
    'class' => 'group invisible overflow-clip open:visible! bg-transparent grid place-items-center h-full w-full inset-0 max-w-none max-h-none backdrop:bg-neutral-950/60'
]) }}>
    <div class="bg-background border border-border shadow-md w-full sm:rounded-lg p-4 sm:min-w-md max-w-lg -translate-y-2 opacity-0 scale-95 group-open:translate-y-0 group-open:opacity-100 group-open:scale-100 transition-all duration-150 dark:bg-neutral-900">
        <div class="flex flex-col space-y-1">
            @if($header->hasActualContent())
                <h2 class="text-lg font-semibold text-foreground">
                    {{ $header }}
                </h2>
            @endif
            {{ $slot }}
        </div>

        <form method="dialog" class="flex justify-end space-x-3 mt-4">
            @if($footer->hasActualContent())
                {{ $footer }}
            @endif
        </form>
    </div>
</dialog>
