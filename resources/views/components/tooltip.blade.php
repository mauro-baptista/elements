@props([
    'tooltip',
    'keepSpace' => false
])

<div
    x-data="{ show: false }"
    x-on:mouseover="show = true"
    x-on:mouseleave="show = false"
    {{ $attributes->class(['relative inline-flex w-auto cursor-pointer']) }}>

    <span x-show="show" x-cloak
          class="bg-gray-800 absolute -mt-5 top-1/2 right-1/2 transform translate-x-1/2 -translate-y-1/2 rotate-45"
          style="width: 10px; height: 10px;"
    ></span>
    <span x-show="show" x-cloak
          class="text-sm text-center overflow-hidden text-white absolute bg-gray-800 rounded-md px-2 py-1 -mt-8 top-1/2 right-1/2 transform translate-x-1/2 -translate-y-1/2"
    >
        {!! $keepSpace ? $tooltip : str_replace(' ', '&nbsp;', $tooltip) !!}
    </span>

    {{ $slot }}
</div>
