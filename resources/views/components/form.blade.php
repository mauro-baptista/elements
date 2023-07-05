@props([
    'submit' => null,
    'collapsable' => false,
    'collapsed' => false,
    'internal' => false,
    'noBackground' => false,
    'on' => null,
])

<form {{ $attributes->wire('submit.prevent') }}>
    <x-elements::block internal="{{ $internal }}" no-background="{{ $noBackground }}" collapsable="{{ $collapsable }}" collapsed="{{ $collapsed }}">
        @if ($header ?? false)
            <x-slot:header>
                {{ $header }}
            </x-slot:header>
        @endif

        @if ($actions ?? false)
            <x-slot:actions>
                {{ $actions }}
            </x-slot:actions>
        @endif

        @if ($title ?? false)
            <x-slot:title>
                {{ $title }}
            </x-slot:title>
        @endif

        @if ($description ?? false)
            <x-slot:description>
                {{ $description }}
            </x-slot:description>
        @endif

        <div class="grid grid-cols-1 gap-y-6 gap-x-4">
            {{ $slot }}
        </div>

        @if ($footer ?? false)
            <x-slot:footer>
                {{ $footer }}
            </x-slot:footer>
        @elseif ($submit !== null)
            <x-slot:footer>
                @if ($on)
                    <x-elements::message :on="$on" />
                @endif

                <x-elements::form.submit>{{ $submit }}</x-elements::form.submit>
            </x-slot:footer>
        @endif
    </x-elements::block>
</form>
