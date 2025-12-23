<div
    @pointerdown="
        if ($event.button === 0 && $event.ctrlKey === false) {
            toggle()

            if (!open) {
                $event.preventDefault()
            }
        }"
    @click="$event.stopPropagation()"
    @keydown="($event.key.includes('Enter') && toggle()) || ($event.key === 'ArrowDown' && (open = true))"
    x-ref="button"
    :aria-expanded="open"
    :aria-controls="$id('dropdown-button')"
    :aria-haspopup="true"
    aria-label="Open menu"
    tabindex="0"
    aria-disabled="false"
    role="button"
    @class([
        "cursor-pointer select-none text-foreground/70 text-sm flex items-center px-1 py-1 mr-2 rounded-md outline-none",
        "aria-[expanded=false]:focus-visible:border-ring aria-[expanded=false]:focus-visible:ring-ring/50 aria-[expanded=false]:focus-visible:ring-[3px] [&_svg]:size-3 hover:aria-[expanded=false]:text-foreground aria-[expanded=true]:opacity-90! aria-[expanded=true]:cursor-default!"
    ])
    style="anchor-name: --my-anchor-in-line"
>
    {{ $slot }}
</div>
