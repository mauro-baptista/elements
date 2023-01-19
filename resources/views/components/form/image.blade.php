@props([
    'type' => 'text',
    'label' => null,
    'image',
    'currentImage' => null,
    'progressBarSize' => 200,
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

    <div class="mt-1 flex items-center"
         x-data="{ isUploading: false, progress: 0, size: {{ $progressBarSize }} }"
         x-on:livewire-upload-start="isUploading = true"
         x-on:livewire-upload-finish="isUploading = false"
         x-on:livewire-upload-error="isUploading = false"
         x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
        <div>
            <span x-show="!isUploading" class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                @if ($image !== null || $currentImage !== null)
                    <img class="h-full w-full text-gray-300" src="{{ is_string($image) ? $image : ($image?->temporaryUrl() ?? $currentImage) }}" alt="Uploaded photo"/>
                @endif
            </span>

            <span x-show="isUploading" class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100 text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mt-2 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </span>

            <button type="button"
                    x-show="!isUploading"
                    onclick="document.getElementById('{{ $name }}').click();"
                    class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-main-500 focus:ring-offset-2">
                {!! $slot->toHtml() ?: 'Change Image' !!}
            </button>
            <input id="{{ $name }}" {{ $attributes->except('class') }} type="file" hidden />
            <x-elements::form.input-error :name="$name" />
        </div>

        @if ($progressBarSize !== null)
            <div x-show="isUploading" class="p-4">
                <div class="text-sm font-medium text-gray-700">Uploading...</div>
                <div class="relative" :style="{width: size + 'px'}">
                    <div class="bg-gray-200 absolute" :style="{width: size + 'px'}">&nbsp;</div>
                    <div class="bg-green-500 absolute" :style="{width: (progress / 100 * size) + 'px'}">&nbsp;</div>
                    <div :class="progress > 55 ? 'text-white' : 'text-gray-800'" class="bg-transparent absolute text-sm font-medium text-center" :style="{width: size + 'px'}">
                        <span x-text="progress"></span> %
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
