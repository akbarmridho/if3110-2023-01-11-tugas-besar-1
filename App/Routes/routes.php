<?php

\Core\Router\Router::get("", [], \App\Http\Controller\HelloController::class, 'hello');
\Core\Router\Router::get("fern", [], \App\Http\Controller\HelloController::class, 'helloFern');
\Core\Router\Router::get("hello/{name}/{age}", [], \App\Http\Controller\HelloController::class, 'helloName');
