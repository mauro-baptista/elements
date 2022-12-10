<?php

namespace MauroBaptista\Elements\Services\Colors;

class Color
{
    public function __construct(
        readonly public string $background,
        readonly public string $text,
    ) {}
}