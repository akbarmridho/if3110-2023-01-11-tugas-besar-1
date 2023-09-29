<?php

namespace Core;

use Exception;

class App
{
    /* All registered class/ objects
     *
     */
    protected static array $registry = [];

    /** Bind key/ value pair into container
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function bind(string $key, mixed $value): void
    {
        static::$registry[$key] = $value;
    }

    /** Get a value from registry
     * @throws Exception
     *
     * return mixed
     */
    public static function get(string $key): mixed
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new Exception("No $key found in the container");
        }

        return static::$registry[$key];
    }
}