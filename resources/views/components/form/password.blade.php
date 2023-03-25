@props([
    'label' => null,
])

@php
    $name = $attributes->get('wire:model') ?? $attributes->get('wire:model.defer') ?? $attributes->get('wire:model.lazy');
    $hasError = $errors->has($name);
@endphp

<div {{ $attributes->merge(['class' => '']) }}>
    @if ($label !== null)
        <label for="{{ $attributes->get('wire:model') }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="mt-1 relative" x-data="{show : false}">
        <input {{ $attributes->wire('model') }} name="{{ $name }}" :type="show ? 'text' : 'password'" @class([
            "shadow-sm block w-full sm:text-sm rounded-md",
            "focus:ring-accent-400 focus:border-accent-400 border-gray-300" => !$hasError,
            "focus:ring-red-500 focus:border-red-500 border-red-300 text-red-900" => $hasError,
        ])>

        <div @class([
            "absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer",
            "text-main-400" => !$hasError,
            "text-red-400" => $hasError,
        ])>
            <svg x-show="!show" @click="show = true" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <svg x-show="show" @click="show = false" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>
        </div>
    </div>
    <x-elements::form.input-error :name="$name" />
</div>
