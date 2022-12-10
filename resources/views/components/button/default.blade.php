@props([
    'type' => 'button',
])

<button type="{{ $type }}"
    {{ $attributes->merge(['class' => 'hover:opacity-75 bg-gray-100 text-gray-900 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-400']) }}
    wire:loading.attr="disabled">
    {{ $slot }}
</button>
