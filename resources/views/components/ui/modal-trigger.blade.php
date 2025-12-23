@props([
    'name' => null
])

<x-ui.button
    {{ $attributes }}
>
    {{ $slot }}
</x-ui.button>
