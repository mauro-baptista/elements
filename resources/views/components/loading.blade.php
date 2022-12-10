@props([
    'onlyOnElement' => false,
    'onBlock' => false,
])

@php
    $class[] = $onlyOnElement || $onBlock ? 'absolute' : 'fixed';
    $class[] = $onBlock ? 'rounded-md sm:rounded-lg' : '';
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $class) . ' flex top-0 right-0 bg-black opacity-75 w-full h-full z-50 justify-center items-center']) }}>
    <div class="flex-row">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; shape-rendering: auto;" width="157px" height="157px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="84" cy="50" r="10" fill="#00bbd3">
                <animate attributeName="r" repeatCount="indefinite" dur="0.7575757575757576s" calcMode="spline" keyTimes="0;1" values="10;0" keySplines="0 0.5 0.5 1" begin="0s"/>
                <animate attributeName="fill" repeatCount="indefinite" dur="3.0303030303030303s" calcMode="discrete" keyTimes="0;0.25;0.5;0.75;1" values="#00bbd3;#f5ac51;#00bbd3;#f5ac51;#00bbd3" begin="0s"/>
            </circle><circle cx="16" cy="50" r="10" fill="#00bbd3">
                <animate attributeName="r" repeatCount="indefinite" dur="3.0303030303030303s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1" values="0;0;10;10;10" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="0s"/>
                <animate attributeName="cx" repeatCount="indefinite" dur="3.0303030303030303s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1" values="16;16;16;50;84" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="0s"/>
            </circle><circle cx="50" cy="50" r="10" fill="#f5ac51">
                <animate attributeName="r" repeatCount="indefinite" dur="3.0303030303030303s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1" values="0;0;10;10;10" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.7575757575757576s"/>
                <animate attributeName="cx" repeatCount="indefinite" dur="3.0303030303030303s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1" values="16;16;16;50;84" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.7575757575757576s"/>
            </circle><circle cx="84" cy="50" r="10" fill="#00bbd3">
                <animate attributeName="r" repeatCount="indefinite" dur="3.0303030303030303s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1" values="0;0;10;10;10" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-1.5151515151515151s"/>
                <animate attributeName="cx" repeatCount="indefinite" dur="3.0303030303030303s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1" values="16;16;16;50;84" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-1.5151515151515151s"/>
            </circle><circle cx="16" cy="50" r="10" fill="#f5ac51">
                <animate attributeName="r" repeatCount="indefinite" dur="3.0303030303030303s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1" values="0;0;10;10;10" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-2.2727272727272725s"/>
                <animate attributeName="cx" repeatCount="indefinite" dur="3.0303030303030303s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1" values="16;16;16;50;84" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-2.2727272727272725s"/>
            </circle>
        </svg>
        <div class="text-2xl text-white text-center ">
            {{ $slot ?? 'Please Wait'}}
        </div>
    </div>
</div>
