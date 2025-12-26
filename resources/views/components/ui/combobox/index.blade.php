@props([
    'id',
    'name',
    'listOptions',
    'selectedOption',
])

<div x-data="{
        options: {{ json_encode($listOptions) }},
        isOpen: false,
        openedWithKeyboard: false,
        selectedOption: {{ json_encode($selectedOption) }},
        setSelectedOption(option) {
            this.selectedOption = option
            this.isOpen = false
            this.openedWithKeyboard = false
            this.$refs.hiddenTextField.value = option.value
        },
        highlightFirstMatchingOption(pressedKey) {
            const option = this.options.find((item) =>
                item.label.toLowerCase().startsWith(pressedKey.toLowerCase()),
            )
            if (option) {
                const index = this.options.indexOf(option)
                const allOptions = document.querySelectorAll('.combobox-option')
                if (allOptions[index]) {
                    allOptions[index].focus()
                }
            }
        },
    }" class="w-full max-w-xs flex flex-col gap-1" x-on:keydown="highlightFirstMatchingOption($event.key)" x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
    @isset($label)
        <label {{ $label->attributes->class(['w-fit pl-0.5 text-sm text-foreground']) }}>
            {{ $label }}
        </label>
    @endisset
    <div class="relative">
        <!-- trigger button  -->
        <x-ui.button variant="outline" type="button" role="combobox" aria-haspopup="listbox" aria-controls="{{ $name . 'List' }}" x-on:click="isOpen = ! isOpen" x-on:keydown.down.prevent="openedWithKeyboard = true" x-on:keydown.enter.prevent="openedWithKeyboard = true" x-on:keydown.space.prevent="openedWithKeyboard = true" x-bind:aria-label="selectedOption ? selectedOption.value : 'Please Select'" x-bind:aria-expanded="isOpen || openedWithKeyboard">
            <span class="text-sm font-normal" x-text="selectedOption ? selectedOption.value : 'Please Select'"></span>
            <!-- Chevron  -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
            </svg>
        </x-ui.button>

        <!-- hidden input to grab the selected value  -->
        <input id="{{ $id }}" name="{{ $name }}" type="text" x-ref="hiddenTextField" hidden/>
        <ul x-cloak x-show="isOpen || openedWithKeyboard" id="{{ $name . 'List' }}" class="absolute z-10 right-0 top-11 flex max-h-44 min-w-48 p-1.5 flex-col overflow-hidden overflow-y-auto scroll-smooth border-border bg-background shadow-xs dark:bg-neutral-800 rounded-md border" role="listbox" aria-label="{{ $name . ' list' }}" x-on:click.outside="isOpen = false, openedWithKeyboard = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition x-trap="openedWithKeyboard">
{{--            <template x-for="(item, index) in options" x-bind:key="item.value">--}}
                {{ $slot }}
{{--                <li class="combobox-option inline-flex justify-between gap-6 bg-transparent px-4 py-2 text-sm text-foreground select-none rounded-md hover:bg-input/50 focus-visible:bg-input/50 focus-visible:outline-hidden" role="option" x-on:click="setSelectedOption(item)" x-on:keydown.enter="setSelectedOption(item)" x-bind:id="'option-' + index" tabindex="0" >--}}
{{--                    <!-- Label  -->--}}
{{--                    <span x-bind:class="selectedOption.label == item.label ? 'font-bold' : null" x-text="item.label"></span>--}}
{{--                    <!-- Screen reader 'selected' indicator  -->--}}
{{--                    <span class="sr-only" x-text="selectedOption.label == item.label ? 'selected' : null"></span>--}}
{{--                    <!-- Checkmark  -->--}}
{{--                    <svg x-cloak x-show="selectedOption.label == item.label" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="size-4" aria-hidden="true">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>--}}
{{--                    </svg>--}}
{{--                </li>--}}
{{--            </template>--}}
        </ul>
    </div>
</div>
