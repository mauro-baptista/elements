@props([
    'noBackground' => false,
    'compact' => false,
    'collapsable' => false,
    'collapsed' => false,
    'delayCollapse' => false,
    'internal' => false,
])

@php
    $class = ' mx-auto w-full relative';
    $class .= ($compact) ? '' : ' mt-4 mb-4';
    $class .= ($internal) ? '' : ' px-4 sm:px-6 lg:px-8';
@endphp

<div
        {{ $attributes->class($class) }}
        x-data="{
            collapsable: {{ $collapsable ? 'true' : 'false' }},
            collapsed: {{ $collapsed && !$delayCollapse ? 'true' : 'false' }},
        }"

        @if($collapsed && $delayCollapse)
            x-init="setTimeout(() => collapsed = true, 300)"
        @endif
>
    @if ($header ?? false)
        <div class="pb-4 sm:flex sm:items-center sm:justify-between @if ($collapsable) cursor-pointer @endif" x-on:click="collapsed = !collapsed">
            <h3 class="text-2xl leading-6 font-medium text-gray-800">
                {{ $header }}
            </h3>

            @if ($actions ?? false)
                <div class="mt-3 sm:mt-0 sm:ml-4">
                    {{ $actions }}
                </div>
            @endif

            <div x-cloak x-show="collapsable" class="mt-3 sm:mt-0 sm:ml-4">
                <span x-show="collapsed && collapsable">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span x-show="!collapsed && collapsable">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
        </div>
    @endif

    <div
            x-cloak
            x-show="!collapsed || !collapsable"
            x-show="open"
            x-transition:enter="transition ease-out duration-300 transform origin-top-right"
            x-transition:enter-start="opacity-0 scale-0"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200 transform origin-top-right"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-0"
            @class([
                'overflow-visible',
                'bg-white shadow-sm rounded-md sm:rounded-lg' => !$noBackground,
            ])
    >
        <div @class([
            'm-auto',
            'px-4 py-5' => !$noBackground && !$compact,
        ])>
            {{ $slot }}
        </div>

        @if ($footer ?? false)
            <div @class([
                'text-right py-3',
                'bg-gray-50 sm:px-6 px-4 round-b-md sm:rounded-b-lg' => !$noBackground,
            ])>
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
