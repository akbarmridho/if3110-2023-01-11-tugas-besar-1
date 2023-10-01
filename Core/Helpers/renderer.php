<?php

function render(string $name, $data = []): void
{
    $meta = [
        'layout' => 'base',
        'title' => 'No Title',
        'css' => [],
        'js' => [],
        'content' => ''
    ];

    (function () use (&$meta, $data, $name) {
        ob_start();
        extract($data);
        // render page view
        require __DIR__ . "/../../resources/views/page/$name.view.php";

        $content = ob_get_clean();

        $meta['content'] = $content;
    })();

    $layout = $meta['layout'];

    require __DIR__ . "/../../resources/views/layout/$layout.layout.php";
}

function render_component(string $name, array $data = [])
{
    $name = str_replace(".", "/", $name);

    extract($data);

    require __DIR__ . "/../../resources/views/components/$name.view.php";
}