<?php

namespace Core\Http;

class Response
{
    public static function status(int $code = 200): void
    {
        http_response_code($code);
    }
}