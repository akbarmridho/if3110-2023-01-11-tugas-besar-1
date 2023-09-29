<?php

namespace Core\Http;

class Request implements RequestInterface
{
    /**
     * Request data
     *
     * @var array
     */
    protected array $data;

    public function __construct()
    {
        $this->data = $_REQUEST;
    }

    /**
     * Get param from request data
     *
     * @param string $key
     * @param string|null $default
     *
     * @return mixed|null
     */
    public function get(string $key, string $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * Get request URI
     *
     * @return string
     */
    public static function uri(): string
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * Get request method
     *
     * @return string
     */
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
