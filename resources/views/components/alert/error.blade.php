<div {{ $attributes->class('w-full bg-gray-100 shadow-sm rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden') }}>
    <div class="p-4">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900">
                    {{ $slot }}
                </p>
            </div>
        </div>
    </div>
</div>
