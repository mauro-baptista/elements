@props([
    'side' => 'left',
    'bgColor' => 'gray-100'
])

<div {{ $attributes->merge(['class' => 'bg-' . $bgColor . ' w-full shadow-sm rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden']) }}>
    <div class="p-4">
        <div class="flex items-start">
            @if ($side === 'left')
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            @endif
            <div class="ml-3 w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900">
                    {{ $slot }}
                </p>
            </div>
            @if ($side === 'right')
                <div class="flex-shrink-0 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            @endif
        </div>
    </div>
</div>
