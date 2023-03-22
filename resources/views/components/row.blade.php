@props([
    'topLeft',
    'bottomLeft' => null,
    'topRight' => null,
    'bottomRight' => null,
    'withImage' => false,
    'image' => null,
    'imageAlt' => null,
    'link' => null,
    'singleColumn' => false,
    'color' => null,
    'imageClass' => 'w-20',
])

@php
    $clickable = $link !== null;

    $backgroundStyle = '';
    $textStyle = '';

    if ($color !== null) {
        $backgroundStyle = 'background: ' . $color;
        $textStyle = 'color: ' . $color;
    }

    $class = $link ? 'block hover:bg-gray-50' : 'block';
@endphp

<div {{ $attributes->class($class) }}>
    @if ($clickable)
        <a href="{{ $link }}">
    @endif
            <div class="flex items-center px-4 py-4 sm:px-6">
                <div class="min-w-0 flex-1 flex items-center">
                    @if ($withImage)
                        <div class="flex-shrink-0">
                            @if ($image)
                                <img class="{{ $imageClass }}" src="{{ $image  }}" alt="{{ $imageAlt }}">
                            @else
                                <div class="h-12 w-12 rounded-full bg-main-400 text-white text-3xl text-center pt-1" style="{{ $backgroundStyle }}">
                                    {{ $imageAlt[0] }}
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="@if (!$singleColumn) min-w-0 flex-1 md:grid md:grid-cols-2 md:gap-4 @endif @if ($withImage) px-4 @endif">
                        <div>
                            <p class="text-sm font-medium text-main-500 truncate" style="{{ $textStyle }}">
                                {{ $topLeft }}
                            </p>
                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                {{ $bottomLeft ?? '' }}
                            </p>
                        </div>
                        <div>
                            <div>
                                <p class="text-sm text-gray-900">
                                    {{ $topRight ?? '' }}
                                </p>
                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                    {{ $bottomRight ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($clickable)
                    <div>
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                @endif
            </div>
    @if ($clickable)
        </a>
    @endif
</div>
