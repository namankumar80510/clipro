#!/usr/bin/env php
<?php

use App\Bootstrap;
use Nette\Utils\FileSystem;
use Nette\Utils\Finder;

if (php_sapi_name() !== 'cli') {
    die("You need to run this script from the command line.\n");
}

// path constants
const DS = DIRECTORY_SEPARATOR;
define("CWD", getcwd() . DS);
const ROOT_DIR = __DIR__ . DS;

// composer autoloader
require_once ROOT_DIR . 'vendor/autoload.php';

// config file
if (!file_exists(CWD . 'config.neon')) {
    FileSystem::write(getcwd() . '/config.neon', <<<NEON
app:
    name: CliPro
    version: 0.0.1
NEON
    );
}

// console application
$app = new Bootstrap();

# register commands
$commandFiles = Finder::findFiles('*Command.php')->from(ROOT_DIR . 'src/Commands');

foreach ($commandFiles as $file) {
    $command = "\\App\\Commands\\" . $file->getBasename('.php');
    $app->register(new $command);
}

# run application
$app->run($argv);
