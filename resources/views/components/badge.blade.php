@props([
    'circle' => null,
    'color' => null,
])

@php
    $class = '';
    if ($color !== null) {
        $color = app(MauroBaptista\Elements\Services\Colors\Colors::class)->get($color);
        $class = $color->text . ' ' . $color->background;
    }
@endphp

<span {{ $attributes->class(['inline-flex items-center px-2 py-0.5 rounded text-xs font-medium', $class]) }}>
    @if ($circle !== null)
        <svg class="mr-1.5 h-2 w-2" style="color: {{ $circle }}" fill="currentColor" viewBox="0 0 8 8">
            <circle cx="4" cy="4" r="3" />
        </svg>
    @endif
    {{ $slot }}
</span>
