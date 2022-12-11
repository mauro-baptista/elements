@props([
    'name',
    'label',
    'optional' => false,
])

<label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
    {{ $label }}

    @if ($optional)
        <span class="text-xs font-light text-gray-400">(Optional)</span>
    @endif
</label>
