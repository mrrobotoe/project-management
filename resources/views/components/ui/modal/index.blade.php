@props(['trigger', 'footer', 'header', 'content', 'label' => 'modal', 'description' => ''])
<div
    x-id=['modal']
    x-data="{
        open: $persist('open'),
        openModal() {
            if (!this.open) {
                this.open = true;
            }

            return this.open;
        },
        closeModal() {
            this.open = false;
        }
    }"
>
    @isset($trigger)
        {{ $trigger }}
    @endisset
    <template x-teleport="body">
        <div
            id="modal-backdrop"
            :data-backdrop="open ? 'open' : 'closed'"
            class="fixed inset-0 overflow-hidden flex items-center justify-center transition-all duration-100 data-[backdrop=closed]:invisible data-[backdrop=open]:visible data-[backdrop=open]:bg-stone-950/60 data-[backdrop=closed]:bg-transparent">
            <div
                role="dialog"
                id="modal"
                aria-modal="true"
                aria-labelledby="{{ $label }}"
                aria-describedby="{{ $description }}"
                :data-modal="open ? 'open' : 'closed'"
                x-on:keydown.escape.window="closeModal"
                x-show="open"
                x-transition:enter="transition ease-in duration-150"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                x-on:click.away="closeModal"
                x-trap.inert.noscroll="open"
                class="min-w-md max-w-lg p-6 border border-foreground/10 shadow-md rounded-lg bg-background z-50 flex flex-col space-y-2 shadow-lg dark:bg-background"
            >
                <div>
                    @isset($header)
                        {{ $header }}
                    @endisset
                </div>

                <div class="">
                    @isset($content)
                        {{ $content }}
                    @endisset
                </div>

                <div class="justify-end ml-auto space-x-2 mt-4">
                    @isset($footer)
                        {{ $footer }}
                    @endisset
                </div>
            </div>
        </div>
    </template>
</div>
