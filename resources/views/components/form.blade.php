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

                <div wire:loading.remove>
                    <x-elements::form.submit>
                        {{ $submit }}
                    </x-elements::form.submit>
                </div>
                <div wire:loading>
                    <x-elements::button.default class="bg-main-200 text-white">
                        <svg class="w-5 h-5 stroke-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" fill="none" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"/>
                            </circle>
                        </svg>

                        <div class="ml-2">{{ $submit }}</div>
                    </x-elements::button.default>
                </div>
            </x-slot:footer>
        @endif
    </x-elements::block>
</form>
