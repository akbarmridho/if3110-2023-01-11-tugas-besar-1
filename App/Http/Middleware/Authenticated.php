<?php

namespace App\Http\Middleware;

use Closure;
use Core\Http\MiddlewareInterface;
use Core\Http\Request;
use Core\Session\Session;

class Authenticated implements MiddlewareInterface
{

    public function handle(Request $request, Closure $next): void
    {
        if (is_null(Session::$user)) {
            redirect('/login');
        } else {
            $next();
        }
    }
}