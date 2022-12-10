@props([
    'value',
    'textEnabled' => 'Active',
    'textDisabled' => 'Inactive',
])

<span {{ $attributes }}>
    @if ($value)
        <x-elements::badge color="light-green">{{ $textEnabled }}</x-elements::badge>
    @else
        <x-elements::badge color="light-red">{{ $textDisabled }}</x-elements::badge>
    @endif
</span>
