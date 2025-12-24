@props(['trigger', 'content', 'label' => 'modal'])
<div
    x-id=['modal']
    x-data="{
        open: false,
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

    </template>
    <div
        id="modal-backdrop"
        x-teleport="document.body"
        :data-backdrop="open ? 'open' : 'closed'"
        class="fixed inset-0 no-scrollbar flex items-center justify-center transition-all duration-200 data-[backdrop=closed]:invisible data-[backdrop=open]:visible data-[backdrop=open]:bg-primary/40 data-[backdrop=closed]:bg-transparent">
        <div
            role="dialog"
            id="modal"
            x-teleport="document.body"
            aria-modal="true"
            aria-labelledby="{{ $label }}"
            :data-modal="open ? 'open' : 'closed'"
            x-on:keydown.escape.window="closeModal"
            class="min-w-md border border-border rounded-lg bg-background z-50 flex items-center justify-center transition-all duration-100 ease-in opacity-95 scale-95 md:-translate-y-30 data-[modal=closed]:invisible data-[modal=open]:visible data-[modal=open]:scale-100 md:data-[modal=open]:-translate-y-30 data-[modal=open]:opacity-100"
        >
            <div class="p-6">
                @isset($content)
                    {{ $content }}
                @endisset
            </div>
        </div>
    </div>
</div>
