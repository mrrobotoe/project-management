<li {{ $attributes->merge(['class' => "w-full combobox-option inline-flex justify-between gap-6 bg-transparent px-4 py-2 text-sm text-foreground select-none rounded-md hover:bg-input/50 focus-visible:bg-input/50 focus-visible:outline-hidden"]) }} role="option" x-on:click="setSelectedOption(item)" x-on:keydown.enter="setSelectedOption(item)" x-bind:id="'option-' + index" tabindex="0" >
    <!-- Label  -->
    <span x-bind:class="selectedOption.value == item.value ? 'font-bold' : null" x-text="item.label"></span>
    <!-- Screen reader 'selected' indicator  -->
    <span class="sr-only" x-text="selectedOption.value == item.value ? 'selected' : null"></span>
    <!-- Checkmark  -->
    <svg x-cloak x-show="selectedOption.value == item.value" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="size-4" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
    </svg>
</li>
