<?php

declare(strict_types = 1);

namespace App\Modules;

class Generator
{
    public static function generate(): array
    {
        return range(80, 200);
    }
}