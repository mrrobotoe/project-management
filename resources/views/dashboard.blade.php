<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-background border border-border overflow-hidden shadow-xs sm:rounded-lg dark:bg-neutral-900">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <x-ui.modal.wrapper labe="eample">
                        <x-slot:trigger>
                            <x-ui.button type="button" @click="openModal()">
                                Open
                            </x-ui.button>
                        </x-slot:trigger>

                        <x-slot:content class="p-6">
                            <h2 class="text-foreground">
                                Modal
                                <x-button variant="outline" @click="closeModal()">Close</x-button>
                            </h2>
                        </x-slot:content>
                    </x-ui.modal.wrapper>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
