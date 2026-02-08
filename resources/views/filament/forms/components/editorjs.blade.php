@once
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@2.29.1/dist/editorjs.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@2.8.1/dist/header.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@1.9.0/dist/list.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@2.6.0/dist/quote.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@2.9.0/dist/code.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@2.3.0/dist/table.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@2.7.0/dist/embed.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.9.0/dist/image.umd.min.js"></script>
    @endpush
@endonce

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{
            state: $wire.entangle('{{ $getStatePath() }}'),
            editor: null,

            init() {
                // Wait for all scripts to load
                if (typeof EditorJS === 'undefined' ||
                    typeof window.Header === 'undefined' ||
                    typeof window.CodeTool === 'undefined') {
                    setTimeout(() => this.init(), 100);
                    return;
                }
                this.initEditor();
            },

            initEditor() {
                let initialData = {};
                try {
                    initialData = this.state ? (typeof this.state === 'string' ? JSON.parse(this.state) : this.state) : {};
                } catch (e) {
                    console.error('Error parsing initial data:', e);
                    initialData = {};
                }

                this.editor = new EditorJS({
                    holder: 'editorjs-{{ $getId() }}',
                    data: initialData,
                    tools: {
                        header: {
                            class: window.Header,
                            inlineToolbar: true,
                        },
                        list: {
                            class: window.List,
                            inlineToolbar: true,
                        },
                        quote: {
                            class: window.Quote,
                            inlineToolbar: true,
                        },
                        code: {
                            class: window.CodeTool,
                        },
                        table: {
                            class: window.Table,
                            inlineToolbar: true,
                        },
                        embed: {
                            class: window.Embed,
                        },
                        image: {
                            class: window.ImageTool,
                            config: {
                                endpoints: {
                                    byFile: '/admin/upload-image',
                                },
                                additionalRequestHeaders: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
                                }
                            }
                        }
                    },
                    onChange: async () => {
                        try {
                            const savedData = await this.editor.save();
                            this.state = JSON.stringify(savedData);
                        } catch (e) {
                            console.error('Error saving Editor.js data:', e);
                        }
                    },
                    minHeight: 300,
                });
            }
        }"
        wire:ignore
    >
        <div
            id="editorjs-{{ $getId() }}"
            class="rounded-lg border border-gray-300 p-4 min-h-[300px] bg-white dark:bg-gray-800 dark:border-gray-600"
        ></div>
    </div>
</x-dynamic-component>
