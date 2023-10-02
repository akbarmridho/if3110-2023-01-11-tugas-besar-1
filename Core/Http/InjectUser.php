<?php

namespace Core\Http;

use App\Model\User;
use Closure;
use Core\Session\Session;

class InjectUser implements MiddlewareInterface
{

    public function handle(Request $request, Closure $next)
    {
        if (array_key_exists('id', $_SESSION)) {
            $id = $_SESSION['id'];
            Session::$user = User::findById($id);
        }

        $next();
    }
}