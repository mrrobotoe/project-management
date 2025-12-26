@props(['disabled' => false])

<select @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-border focus-visible:ring-ring focus-visible:ring-2 focus-visible:border-ring rounded-md shadow-xs']) }}
>
    {{ $slot }}
</select>
