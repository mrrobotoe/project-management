@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-border bg-input text-foreground focus:border-indigo-500 dark:focus:border-foreground focus:ring-indigo-500 dark:focus:ring-foreground rounded-md shadow-xs']) }}>
