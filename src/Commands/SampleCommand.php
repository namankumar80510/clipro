<?php

namespace App\Commands;

class SampleCommand extends Base implements CommandInterface
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return "sample";
    }

    /**
     * @param array<mixed> $args
     * @return void
     */
    public function execute(array $args): void
    {
        echo $this->color("This is a sample command...\n", "blue");
    }
}
