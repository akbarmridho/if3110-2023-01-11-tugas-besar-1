<?php

namespace Core\Session;

use App\Model\User;
use Core\Exception\HttpException;

class Session
{
    public static ?User $user = NULL;

    public static function isAuthenticated(): bool
    {
        return !is_null(static::$user);
    }

    public static function login(User $user)
    {
        session_regenerate_id(true);
        $_SESSION['id'] = $user->id;
        static::$user = $user;
    }

    public static function logout()
    {
        if (!session_destroy()) {
            throw new HttpException('Cannot destroy session');
        }
    }
}