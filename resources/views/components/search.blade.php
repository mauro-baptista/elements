<x-elements::form collapsable collapsed wire:submit.prevent="search">
    <x-slot name="header">
        {{ __('Search') }}
    </x-slot>

    <div x-cloak class="grid grid-cols-1 md:grid-cols-6 gap-4">
        {{ $slot }}
    </div>

    <x-slot name="footer">
        <x-elements::button.default wire:click="clean">Reset</x-elements::button.default>
        <x-elements::form.submit>Search</x-elements::form.submit>
    </x-slot>
</x-elements::form>
