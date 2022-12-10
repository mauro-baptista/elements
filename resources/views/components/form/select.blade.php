@props([
    'options',
    'label' => null,
    'placeholder' => null,
    'ordered' => false,
])

@php
    $directive = $attributes->wire('model');
    $hasError = $errors->has($directive->value);

    $options = collect($options)->map(function ($value, $key) {
        return [
            'key' => $key,
            'value' => $value,
        ];
    })->values();

    if ($ordered) {
        $options = $options->sortBy('value');
    }
@endphp

<div {{ $attributes->class('') }}>
    @if ($label !== null)
        <label for="{{ $directive->value }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="relative mt-1"
         x-data="{
            selected: @entangle($directive),
            options: @js($options),
            placeholder: '{{ $placeholder }}',
            open: false,
            isSelected(value) {
                return value == this.selected;
            },
            isEmpty() {
                return this.selected === '' || this.selected === null;
            },
            display() {
                if (!this.isEmpty()) {
                    for (const [_, option] of Object.entries(this.options)) {
                        if (this.isSelected(option['key'])) {
                            return option['value'];
                        }
                    }
                }

                if (this.placeholder) {
                    return this.placeholder;
                }

                return '-';
            },
         }" x-on:click="open = !open" x-on:click.away="open = false">

        <input type="text" readonly name="{{ $directive->value }}" x-bind:value="display()" class="w-full select-none cursor-pointer rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus-within:border-accent-400 focus:ring-1 focus:ring-accent-400 sm:text-sm" role="combobox" aria-controls="options" aria-expanded="false"/>
        <button type="button" class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none" tabindex="-1">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
        <ul x-show="open" class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" id="options" role="listbox">
            <li @click="selected = null"
                x-show="placeholder"
                class='relative cursor-default select-none py-2 pl-3 pr-9 cursor-pointer'
                :class="{
                    'text-white bg-main-400': isEmpty(),
                    'text-gray-900 hover:bg-main-100': !isEmpty(),
                }" id="option-0" role="option" tabindex="0">
                <span class='block truncate' :class="{'font-semibold': isEmpty()}">{{ $placeholder }}</span>

                <span x-show="isEmpty()" class="absolute inset-y-0 right-0 flex items-center pr-4 text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            </li>

            @foreach ($options as $option)
                <li @click="selected = '{{ $option['key'] }}'"
                    class='relative cursor-default select-none py-2 pl-3 pr-9 cursor-pointer'
                    :class="{
                        'text-white bg-main-400': isSelected('{{ $option['key'] }}'),
                        'text-gray-900 hover:bg-main-100': !isSelected('{{ $option['key'] }}'),
                    }" id="option-{{ $loop->count }}" role="option" tabindex="{{ $loop->count }}">
                    <span class="block truncate" :class="{'font-semibold': isSelected('{{ $option['key'] }}')}">{{ $option['value'] }}</span>

                    <span x-show="isSelected('{{ $option['key'] }}')" class="absolute inset-y-0 right-0 flex items-center pr-4 text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
    <x-elements::form.input-error :name="$directive->value" />
</div>
