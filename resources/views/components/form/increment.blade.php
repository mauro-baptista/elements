@props([
    'name' => null,
    'type' => 'text',
    'label' => null,
    'asCompany' => false,
    'optional' => false,
    'min' => 0,
    'max' => 100,
])

@php
    $name = $attributes->get('wire:model') ?? $attributes->get('wire:model.defer') ?? $name;
    $hasError = $errors->has($name);
    $class = $asCompany
        ? 'focus:ring-company-color focus:border-company-color border-gray-300'
        : 'focus:ring-accent-400 focus:border-accent-400 border-gray-300';
@endphp

<div
    x-data="{
        value: @entangle($name),
        min: {{ $min}},
        max: {{ $max }},
        add() {
            if (this.value >= this.max) {
                this.value = this.max;
                return;
            }

            this.value += 1;
        },
        subtract() {
            if (this.value <= this.min) {
                this.value = this.min;
                return;
            }

            this.value -= 1;
        },
    }"
    {{ $attributes->only('class') }}
>
    @if ($label !== null)
        <x-elements::form.label :name="$name" :label="$label" :optional="$optional" />
    @endif
    <div class="mt-1 flex rounded-md shadow-sm">
        <button x-on:click="subtract" type="button"
                @class([
                    "relative shadow-sm inline-flex items-center space-x-2 rounded-l-md border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-1",
                    "focus:ring-company-color focus:border-company-color" => $asCompany,
                    "focus:ring-main-400 focus:border-main-400" => !$asCompany,
                ])
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
            </svg>
        </button>
        <div class="relative -ml-px flex flex-grow items-stretch focus-within:z-10">
            <input {{ $attributes->except('class') }} name="{{ $name }}" id="{{ $name }}" type="{{ $type }}" @class([
                "shadow-sm block w-full sm:text-sm text-center",
                $class => !$hasError,
                "focus:ring-red-500 focus:border-red-500 border-red-300 text-red-900" => $hasError,
            ]) />
            <x-elements::form.input-error :name="$name" />
        </div>
        <button x-on:click="add" type="button"
            @class([
                "relative shadow-sm -ml-px inline-flex items-center space-x-2 rounded-r-md border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-1",
                "focus:ring-company-color focus:border-company-color" => $asCompany,
                "focus:ring-main-400 focus:border-main-400" => !$asCompany,
            ])
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
        </button>
    </div>
</div>
