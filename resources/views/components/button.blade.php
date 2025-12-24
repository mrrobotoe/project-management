@props([
    'variant' => null
])

@php
    $variantClasses = match($variant) {
        'danger' => 'whitespace-nowrap rounded-radius bg-destructive border border-destructive px-4 py-2 text-sm font-medium tracking-wide text-destructive-foreground transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-destructive active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed',
        'ghost' => 'bg-transparent rounded-radius px-4 py-2 text-sm font-medium tracking-wide text-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed',
        'outline' => 'whitespace-nowrap bg-transparent rounded-radius border border-border px-4 py-2 text-sm font-medium tracking-wide text-primary transition hover:opacity-75 text-center dark:bg-input focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed',
        default => 'whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed'
    };
@endphp

<button {{
    $attributes->merge([
        'type' => 'submit',
        'class' => "rounded-md shrink-0 $variantClasses"
    ])
}}>
    {{ $slot }}
</button>
