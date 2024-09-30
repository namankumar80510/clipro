#!/usr/bin/env php
<?php

use Dikki\Clipro\Core\Clipro;

if (php_sapi_name() !== 'cli') {
    die("You need to run this script from the command line.\n");
}

// path constants
const DS = DIRECTORY_SEPARATOR;
define("CWD", getcwd() . DS);
const ROOT_DIR = __DIR__ . DS;

// composer autoloader
require_once ROOT_DIR . 'vendor/autoload.php';

// console application
$app = new Clipro(
    configDir: __DIR__ . '/config',
    commandDir: __DIR__ . '/src/Commands'
);

# run application
$app->run($argv);
