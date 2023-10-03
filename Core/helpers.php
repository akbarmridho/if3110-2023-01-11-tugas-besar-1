<?php

require_once __DIR__ . "/Helpers/renderer.php";

function redirect(string $path): void
{
    if (str_starts_with($path, "/")) {
        $path = ltrim($path, "/");
    }
    header("Location: /$path");
}

function js(string $name)
{
    return "/js/" . $name;
}

function css(string $name)
{
    return "/css/" . $name;
}

function assets(string $name)
{
    return "/assets/" . $name;
}

function storage(string $name)
{
    return "/storage/" . $name;
}

function hash_password(string $password): string
{
    return password_hash($password, PASSWORD_BCRYPT);
}