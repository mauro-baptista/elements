@props(['label'])

<div class="sm:col-span-1 md:col-span-3">
    <dt class="text-sm font-medium text-gray-500">
        {{ $label }}
    </dt>
    <dd {{ $attributes->merge(['mt-1 text-sm text-gray-900']) }}>
        {{ $slot }}
    </dd>
</div>
