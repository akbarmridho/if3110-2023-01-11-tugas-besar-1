<?php

namespace Core;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function ($class) {
            $file = ".." . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}
