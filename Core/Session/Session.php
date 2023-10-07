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

        session_start();
    }

    public static function setMessage(string $message)
    {
        $_SESSION['message'] = $message;
    }

    public static function getCleanMessage(): ?string
    {
        if (array_key_exists('message', $_SESSION)) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
            return $message;
        }

        return null;
    }
}