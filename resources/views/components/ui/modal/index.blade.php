@props(['trigger', 'footer', 'header', 'content', 'label' => 'modal', 'description' => ''])
<div
    x-id=['modal']
    x-data="{
        open: $persist(true, 'open'),
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
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-on:click.away="closeModal"
                x-trap.inert.noscroll="open"
                class="min-w-md max-w-lg p-6 border border-foreground/10 rounded-lg bg-background z-50 flex flex-col space-y-2 shadow-lg"
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
