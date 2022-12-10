@props(['id' => null, 'maxWidth' => null])

<x-elements::modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <x-elements::block internal>
        @if ($header ?? false)
            <div class="pb-4 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-2xl leading-6 font-medium text-gray-800">
                    {{ $header }}
                </h3>
            </div>
        @endif

        {{ $slot }}

        @if ($footer ?? false)
            <x-slot name="footer">
                {{ $footer }}
            </x-slot>
        @endif
    </x-elements::block>
</x-elements::modal>
