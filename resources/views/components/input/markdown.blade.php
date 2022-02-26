@props(['value' => ''])

<div class="border-4 bg-white rounded-lg">
    <div
        {{ $attributes }}
        x-data="{ value: {{ $value }} }"
        @value-updated="$dispatch('input', $event.detail)"
    >
        <div
            @input.stop
            x-data="{
                value: {{ $value }},
                init() {
                    let editor = new SimpleMDE({ element: this.$refs.editor })

                    editor.value(this.value)

                    editor.codemirror.on('change', () => {
                        console.log('changed')
                        $dispatch('value-updated', editor.value())
                        this.value = editor.value()
                    })
                },
            }"
            wire:ignore
        >
            <textarea x-ref="editor"></textarea>
        </div>
    </div>

</div>
