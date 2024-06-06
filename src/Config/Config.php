<?php

namespace App\Config;

use Nette\Neon\Neon;

class Config
{
    public static function getAll(): mixed
    {
        return Neon::decode(file_get_contents(getcwd() . '/config.neon'));
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        $config = self::getAll();
        $keys = explode('.', $key);

        foreach ($keys as $k) {
            if (isset($config[$k])) {
                $config = $config[$k];
            } else {
                return $default;
            }
        }

        return $config;
    }
}
