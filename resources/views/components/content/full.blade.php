@props(['label'])

<div class="sm:col-span-2 md:col-span-6">
    <dt class="text-sm font-medium text-gray-500">
        {{ $label }}
    </dt>
    <dd class="mt-1 text-sm text-gray-900">
        {{ $slot }}
    </dd>
</div>
