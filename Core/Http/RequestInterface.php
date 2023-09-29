<?php

namespace Core\Http;

interface RequestInterface
{
    /**
     * Get request URI
     *
     * @return string
     */
    public static function uri(): string;

    /**
     * Get param from request data
     *
     * @param string $key
     * @param string|null $default
     *
     * @return mixed|null
     */
    public function get(string $key, string $default = null): mixed;

    /**
     * Get request method
     *
     * @return string
     */
    public static function method(): string;
}
