@props([
    'type' => 'button',
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-main-500']) }}>
    {{ $slot }}
</button>
