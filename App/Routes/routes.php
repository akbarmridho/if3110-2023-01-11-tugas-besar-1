<?php

\Core\Router\Router::get("", [], \App\Http\Controller\HelloController::class, 'hello');
\Core\Router\Router::get("fern", [], \App\Http\Controller\HelloController::class, 'helloFern');
\Core\Router\Router::get("hello/{name}/{age}", [], \App\Http\Controller\HelloController::class, 'helloName');

\Core\Router\Router::get("login", [\App\Http\Middleware\Guest::class], \App\Http\Controller\AuthController::class, 'loginView');
\Core\Router\Router::post("login", [\App\Http\Middleware\Guest::class], \App\Http\Controller\AuthController::class, 'login');
\Core\Router\Router::post("logout", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\AuthController::class, 'logout');