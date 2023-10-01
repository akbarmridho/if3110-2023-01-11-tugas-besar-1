<?php

function redirect(string $path): void
{
    header("Location: /$path");
}

function render_page(string $name, $data = [], string $title = "No Title", array $js = [], array $css = [], string $layout = "base"): void
{
    $layoutContent = "";

    // replace dot with slash
    $name = str_replace(".", "/", $name);

    (function () use ($title, $js, $css, $layout, &$layoutContent) {
        ob_start();
        require __DIR__ . "/../resources/views/layout/$layout.layout.php";

        $layoutContent = ob_get_clean();

        if (!$layoutContent) {
            throw new Exception("Invalid contents on layout");
        }
    })();

    (function () use ($layoutContent, $data, $name) {
        ob_start();
        extract($data);
        // render page view
        require "../resources/views/page/$name.view.php";

        $view = ob_get_clean();

        print str_replace("{content}", $view, $layoutContent);
    })();
}

function render_component(string $name, array $data = [])
{
    $name = str_replace(".", "/", $name);

    extract($data);

    require "../resources/views/components/$name.view.php";
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