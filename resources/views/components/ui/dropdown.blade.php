<div
    x-cloak
    x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
    }"

    @click.outside="open = false" @close.stop="open = false"
    x-on:keydown.escape.prevent.stop="close($refs.button)"
    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
    x-id="['dropdown-button']"
    {{ $attributes->merge(['type' => 'button', 'class' => 'relative' ]) }}
>
    {{ $slot }}
</div>
