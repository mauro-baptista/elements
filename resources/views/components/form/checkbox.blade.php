@props([
    'name',
    'description' => null,
    'checked' => false,
    'hasError' => false,
])

<div {{ $attributes->class('relative flex items-start') }}>
    <div class="flex items-center h-5">
        <input
            id="{{ $name }}" name="{{ $name }}" dusk="{{ $name }}" {{ $attributes->wire('model') }} type="checkbox" @if ($checked) checked @endif
            class='focus:ring-main-500 h-4 w-4 text-main-600 border-gray-300 rounded text-main-600'
        >
    </div>
    <div class="ml-3 text-sm">
        <label for="{{ $name }}"
        @class([
            'font-medium',
            'text-gray-600' => !$hasError,
            'text-red-600' => $hasError,
        ])>{{ $slot }}</label>
        @if($description !== null)
            <p id="{{ $name }}-description" class="text-gray-500">{{ $description }}</p>
        @endif
    </div>
</div>
