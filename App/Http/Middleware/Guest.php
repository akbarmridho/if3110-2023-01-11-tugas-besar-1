<?php

namespace App\Http\Middleware;

use Closure;
use Core\Http\MiddlewareInterface;
use Core\Http\Request;
use Core\Session\Session;

class Guest implements MiddlewareInterface
{

    public function handle(Request $request, Closure $next)
    {
        if (!is_null(Session::$user)) {
            redirect('/');
        } else {
            $next();
        }
    }
}