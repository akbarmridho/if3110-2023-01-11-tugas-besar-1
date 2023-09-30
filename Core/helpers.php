<?php

function redirect(string $path): void
{
    header("Location: /$path");
}

function view($name, $data = [], string $title = "No Title", array $js = [], array $css = [], string $layout = "base")
{
    ob_start();
    require __DIR__ . "/../resources/views/layout/$layout.layout.php";

    $layoutContent = ob_get_clean();

    if (!$layoutContent) {
        throw new Exception("Invalid contents on layout");
    }

    ob_start();
    extract($data);
    // render page view
    require "../resources/views/$name.view.php";

    $view = ob_get_clean();

    print str_replace("{content}", $view, $layoutContent);
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