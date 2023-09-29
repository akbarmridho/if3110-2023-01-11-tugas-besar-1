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