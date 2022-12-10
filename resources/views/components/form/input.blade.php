@props([
    'type' => 'text',
    'label' => null,
])

@php
    $name = $attributes->get('wire:model') ?? $attributes->get('wire:model.defer');
    $hasError = $errors->has($name);
@endphp

<div {{ $attributes->class('') }}>
    @if ($label !== null)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="mt-1">
        <input {{ $attributes->except('class') }} name="{{ $name }}" type="{{ $type }}" @class([
            "shadow-sm block w-full sm:text-sm rounded-md",
            "focus:ring-accent-400 focus:border-accent-400 border-gray-300" => !$hasError,
            "focus:ring-red-500 focus:border-red-500 border-red-300 text-red-900" => $hasError,
        ]) />
        <x-elements::form.input-error :name="$name" />
    </div>
</div>
