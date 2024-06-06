<?php

namespace App;

use App\Commands\CommandInterface;

class Bootstrap
{
    /**
     * An array of application commands.
     *
     * @var array<object>
     */
    private array $commands = [];

    /**
     * Register a new command.
     *
     * @param CommandInterface $command
     * @return void
     */
    public function register(CommandInterface $command): void
    {
        $this->commands[$command->getName()] = $command;
    }

    /**
     * Run the application.
     *
     * @param $argv
     * @return void
     */
    public function run(mixed $argv): void
    {
        if (count($argv) < 2) {
            $this->showUsage();
            return;
        }

        // app commands
        $commandName = $argv[1];
        if (!isset($this->commands[$commandName])) {
            echo "Command not found. Available commands:\n";
            foreach ($this->commands as $command) {
                echo " - " . $command->getName() . "\n";
            }
            return;
        }

        $command = $this->commands[$commandName];
        $command->execute(array_slice($argv, 2));
    }

    /**
     * Show the usage of the application.
     *
     * @return void
     */
    private function showUsage(): void
    {
        // app welcome
        echo "\033[" . 34 . "m" . config('app.name') . PHP_EOL . "\033[0m";
        echo "\033[" . 32 . "m" . config('app.version') . PHP_EOL . "\033[0m";
        echo "Welcome to the application!" . PHP_EOL;
        echo "-------------------------------------" . PHP_EOL;
        echo PHP_EOL;

        // app commands usage
        echo "Usage: php app [command]\n";
        echo "Available commands:\n";
        foreach ($this->commands as $command) {
            echo " - " . $command->getName() . "\n";
        }
    }
}
