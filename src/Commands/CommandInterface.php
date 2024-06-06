<?php

namespace App\Commands;

interface CommandInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param array<mixed> $args
     * @return void
     */
    public function execute(array $args): void;
}
