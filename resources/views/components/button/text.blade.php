@props([
    'type' => 'button',
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'mr-1 hover:opacity-75 text-gray-900 inline-flex justify-center py-2 px-4 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-400']) }}>
    {{ $slot }}
</button>
