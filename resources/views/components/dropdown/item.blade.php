@props([
    'active' => false,
    'description' => null,
    'danger' => false,
])

@php
    $class = 'group flex items-center px-4 py-2 text-sm ';
    $class .= $danger ? 'hover:bg-red-100 ' : 'hover:bg-gray-100 ';
    $class .= $active ? 'bg-gray-100 text-gray-900' : 'text-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $class]) }} role="menuitem">
    @if ($description === null)
        {{ $slot }}
    @else
        <div>
            <div><strong>{{ $slot }}</strong></div>
            <div class="text-sm mt-1">{{ $description }}</div>
        </div>
    @endif
</a>
