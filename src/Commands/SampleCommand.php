<?php

declare(strict_types=1);

namespace App\Commands;

use Dikki\Clipro\Core\Commands\Base;
use Dikki\Clipro\Core\Commands\CommandInterface;

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
    public function execute(array $args): int
    {
        $this->cli->green("This is a sample command...\n");
        return 0;
    }
}
