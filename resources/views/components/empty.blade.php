@props([
    'text' => null,
])

<div {{ $attributes->class(['relative block w-full border-2 border-gray-300 border-dashed rounded-lg px-12 py-6 text-center']) }}>
    @if ($slot->isEmpty())
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
        </svg>
    @else
        {{ $slot }}
    @endif
    <span class="mt-2 block text-sm font-medium text-gray-900"> {{ $text }} </span>
</div>
