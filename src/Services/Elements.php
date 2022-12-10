<?php

namespace MauroBaptista\Elements\Services;

use MauroBaptista\Elements\Services\Colors\Colors;

class Elements
{
    public function __construct(
        readonly public Colors $colors
    ) {}
}