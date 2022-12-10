@props([
    'label',
    'limit' => 0,
    'rows' => 2,
])

@php
    $name = $attributes->wire('model')->value();
    $uniqueRef = 'counter_' . $name . '_' . uniqid();
    $hasError = $errors->has($name);
@endphp

<div {{ $attributes->class('') }}
     x-data="{
        value: @entangle($attributes->wire('model')).defer,

        limit: {{ $limit }},

        get display() { return this.limit > 1 },
        get count() { return this.value.length },
    }"
>

    @if ($label !== null)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="mt-1">
        <textarea x-ref="{{ $uniqueRef }}" x-model="value" {{ $attributes->wire('model') }} name="{{ $name }}" rows="{{ $rows }}" type="text" @class([
            "shadow-sm  block w-full sm:text-sm rounded-md",
            "focus:ring-accent-400 focus:border-accent-400 border-gray-300" => !$hasError,
            "focus:ring-red-500 focus:border-red-500 border-red-300 text-red-900" => $hasError,
        ])></textarea>

        <div x-show="display" class="text-gray-400 text-xs mt-1 text-right">
            <span x-text="count"></span> / {{ $limit }}
        </div>

        <x-elements::form.input-error :name="$name" />
    </div>
</div>
