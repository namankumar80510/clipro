<?php

namespace App\Commands;

abstract class Base
{
    /**
     * @var array|int[]
     */
    protected array $colors = [
        'black' => 30,
        'red' => 31,
        'green' => 32,
        'yellow' => 33,
        'blue' => 34,
        'magenta' => 35,
        'cyan' => 36,
        'white' => 37,
    ];

    protected function color(string $text, string $color): string
    {
        return "\033[" . $this->colors[$color] . "m" . $text . "\033[0m";
    }
}
