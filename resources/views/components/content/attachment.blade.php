@props([
    'label' => null
])

<div class="sm:col-span-2 md:col-span-6">
    <dt class="text-sm font-medium text-gray-500">{{ $label ?? 'Attachments' }}</dt>
    <dd class="mt-1 text-sm text-gray-900">
        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
            {{ $slot }}
        </ul>
    </dd>
</div>
