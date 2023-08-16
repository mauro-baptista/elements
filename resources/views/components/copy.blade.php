@props([
    'href',
    'target' => '_blank',
])

@php
    $id = \Illuminate\Support\Str::random();
@endphp

<div x-data="{{ $id }}" class="inline-block cursor-pointer hover:text-main-400 pt-1">
    <div class="relative inline-flex w-auto cursor-pointer">
        <div id="{{ $id }}_copied" class="hidden">
            <span class="bg-gray-800 absolute -mt-5 top-1/2 right-1/2 transform translate-x-1/2 -translate-y-1/2 rotate-45" style="width: 10px; height: 10px;"></span>
            <span class="text-sm text-center overflow-hidden text-white absolute bg-gray-800 rounded-md px-2 py-1 -mt-8 top-1/2 right-1/2 transform translate-x-1/2 -translate-y-1/2">Copied</span>
        </div>

        <x-elements::tooltip tooltip="Copy" @click="copy('{{ $id }}')" keep-space>
            <x-slot:tooltip>
                <span x-text="text"></span>
            </x-slot:tooltip>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            <textarea class="hidden" id="{{ $id }}">{{ $slot }}</textarea>
        </x-elements::tooltip>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('{{ $id }}', () => ({
                text: 'Copy',

                change(text) {
                    this.text = text
                },

                copy(id) {
                    let text = document.getElementById(id)
                    text.classList.remove('hidden')
                    text.select()
                    document.execCommand("copy")
                    text.classList.add('hidden')

                    this.change('Copied')
                    setTimeout(() => this.change('Copy'), 1000)
                }
            }))
        })
    </script>
@endpush
