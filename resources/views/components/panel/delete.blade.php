@props(['click'])

<div {{ $attributes->class('rounded-md bg-gray-50 border border-red-700 px-6 py-5 sm:flex sm:items-start sm:justify-between mt-4') }}>
    <div class="sm:flex sm:items-start">
        <div class="mt-3 sm:mt-0 sm:ml-4">
            <div class="text-sm font-medium text-gray-900">
                {{ $slot }}
            </div>
            <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                This action cannot be undone.
            </div>
        </div>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
        <x-elements::button.danger wire:click="{{ $click }}">
            Yes, delete it!
        </x-elements::button.danger>
    </div>
</div>
