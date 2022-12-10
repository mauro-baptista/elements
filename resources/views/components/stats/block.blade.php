@props(['columns'])

@php
    $columnClass = match((int) $columns) {
        2 => 'md:grid-cols-2',
        3 => 'md:grid-cols-3',
        4 => 'md:grid-cols-4',
        default => ''
    };
@endphp
<dl {{ $attributes->merge(['class' => 'grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:divide-y-0 md:divide-x ' . $columnClass]) }}>
    {{ $slot }}
</dl>
