<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-foreground">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-foreground/70">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-ui.modal label="example">
        <x-slot:trigger>
            <x-ui.button size='sm' variant="danger" type="button" @click="openModal()">
                Delete account
            </x-ui.button>
        </x-slot:trigger>
        <x-slot:header>
            <h2 class="text-left text-foreground text-lg font-semibold">
                Are you sure you want to delete your account?
            </h2>
        </x-slot:header>
        <x-slot:content class="text-foreground">
            <div class="text-foreground/80 text-sm">
                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
            </div>
            <form method="post" action="{{ route('profile.destroy') }}" id="delete_form">
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
            </form>
        </x-slot:content>
        <x-slot:footer>
            <x-ui.button variant="outline" @click="closeModal()">Cancel</x-ui.button>
            <x-ui.button variant="danger" type="submit" class="" form="delete_form">
                {{ __('Delete Account') }}
            </x-ui.button>
        </x-slot:footer>
    </x-ui.modal>
</section>
