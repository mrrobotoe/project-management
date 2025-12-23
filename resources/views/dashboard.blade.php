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
                    <x-ui.modal-trigger onclick="my_modal_1.showModal()">
                        Click
                    </x-ui.modal-trigger>
                    <x-ui.modal id="my_modal_1">
                        <x-slot:header class="text-foreground">Leave team?</x-slot:header>
                        <div class="text-foreground/80 text-sm">Are you sure you want to leave this team? All of your teams and projects will be deleted.</div>
                        <x-slot:footer>
                            <x-ui.button variant="outline">Cancel</x-ui.button>
                            <x-ui.button type="button">Leave</x-ui.button>
                        </x-slot:footer>
                    </x-ui.modal>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
