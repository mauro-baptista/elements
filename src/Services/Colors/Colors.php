<?php

namespace MauroBaptista\Elements\Services\Colors;

class Colors
{
    public function __construct(private array $colors) {}

    public function get(?string $color): Color
    {
        $colorArray = $this->colors[$color] ?? $this->colors[config('elements.default_color')];

        return new Color(
            background: $colorArray[0],
            text: $colorArray[1],
        );
    }
}