@props([
    'type' => 'submit',
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-main-400 hover:bg-main-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-400']) }}>
    {{ $slot }}
</button>
