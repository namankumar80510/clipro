<?php

use App\Config\Config;
use Nette\Utils\FileSystem;

/**
 * get config
 *
 * @param string $key
 * @param mixed $default
 * @return mixed|null
 */
function config(string $key, mixed $default = null): mixed
{
    return Config::get($key, $default);
}

/**
 * @param string $text
 * @param string $lang
 * @return mixed
 */
function lang(string $text, string $lang): mixed
{
    return config('lang.text.' . $lang)[strtolower($text)] ?? $text;
}

/**
 * @return void
 */
function createConfigFile(): void
{

    FileSystem::write(CWD . 'config.neon', <<<NEON
app:
    name: PHP CLI
    version: 0.0.1
NEON);
}
