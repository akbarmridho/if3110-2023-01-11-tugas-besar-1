<?php

namespace Core\Session;

use App\Model\User;

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
        session_destroy();
    }
}