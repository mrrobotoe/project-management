<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-foreground">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-foreground/70">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-ui.modal-trigger onclick="delete_account_modal.showModal()" variant="danger">
        Delete Account
    </x-ui.modal-trigger>


    <x-ui.modal
        :isOpen="$errors->userDeletion->isNotEmpty()"
        id="delete_account_modal"
    >
        <x-slot:header class="text-foreground"> Are you sure you want to delete your account?</x-slot:header>
        <div class="text-foreground/80 text-sm">
            Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
        </div>
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-ui.text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-ui.button variant="danger" class="ms-3" @click="$event.preventDefault(); $el.closest('form').submit();">
                    {{ __('Delete Account') }}
                </x-ui.button>
            </div>
        </form>
        <x-ui.modal-trigger-close variant="outline">
            {{ __('Cancel') }}
        </x-ui.modal-trigger-close>
    </x-ui.modal>
</section>
