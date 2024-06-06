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
        // check if an argument was passed to the command
        if (!empty($args)) {
            // check if the argument is a valid port number
            if (!is_numeric($args[0])) {
                echo $this->color("Invalid port number provided.\n", "red");
                return;
            }
            $port = $args[0];
        } else {
            $port = 8000; // Default port
        }

        // start the server
        echo $this->color("Starting server on port $port...\n", "blue");
    }
}
