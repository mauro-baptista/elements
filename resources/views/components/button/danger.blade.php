@props([
    'type' => 'button',
])

<button type="{{ $type }}"
        {{ $attributes->merge(['class' => 'bg-white hover:bg-red-100 hover:border-red-700 text-red-700 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400']) }}
        wire:loading.attr="disabled"
>
    {{ $slot }}
</button>
