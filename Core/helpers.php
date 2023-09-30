<?php

function redirect(string $path): void
{
    header("Location: /$path");
}

function view($name, $data = [])
{
    extract($data);

    return require "../resources/views/$name.view.php";
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