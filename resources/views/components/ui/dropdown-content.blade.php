@props([
    'align' => 'top',
    'position' => 'left'
])

@php
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top' => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};
@endphp

<ul
    x-show="open"
    x-ref="panel"
    :id="$id('dropdown-button')"
    tabindex="-1"
    x-cloak
    x-on:click.outside="close($refs.button)"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="transform opacity-100 scale-100"
    x-transition:leave-end="transform opacity-0 scale-95"
    @click="open = false"
    aria-labelledby="dropdown-button"
    style="
    position: absolute;
    {{ $align }}: anchor(--my-anchor-in-line inside);
    {{ $position }}: anchor(--my-anchor-in-line outside);
    "
    {{ $attributes->merge(['class' =>
        'py-2 px-2 bg-background border border-border rounded-md shadow-sm ' . $alignmentClasses,
    ]) }}
>
    {{ $slot }}
</ul>
