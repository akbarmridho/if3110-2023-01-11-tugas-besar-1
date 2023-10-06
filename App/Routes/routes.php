<?php

\Core\Router\Router::get("", [], \App\Http\Controller\AnimeController::class, 'index');
\Core\Router\Router::get("search", [], \App\Http\Controller\AnimeController::class, 'search');

\Core\Router\Router::get('anime/{id}', [], \App\Http\Controller\AnimeController::class, 'view');
\Core\Router\Router::get('profile/{id}', [], \App\Http\Controller\ProfileController::class, 'view');

\Core\Router\Router::get("login", [\App\Http\Middleware\Guest::class], \App\Http\Controller\AuthController::class, 'loginView');
\Core\Router\Router::post("login", [\App\Http\Middleware\Guest::class], \App\Http\Controller\AuthController::class, 'login');
\Core\Router\Router::post("logout", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\AuthController::class, 'logout');

\Core\Router\Router::get("addanime", [\App\Http\Middleware\Admin::class], \App\Http\Controller\AddAnimeController::class, 'addAnimeView');
\Core\Router\Router::post("addanime", [\App\Http\Middleware\Admin::class], \App\Http\Controller\AddAnimeController::class, 'addAnime');

\Core\Router\Router::get("animeeditor/{id}", [\App\Http\Middleware\Admin::class], \App\Http\Controller\EditAnimeController::class, 'editAnimeView');
\Core\Router\Router::post("animeeditor/{id}", [\App\Http\Middleware\Admin::class], \App\Http\Controller\EditAnimeController::class, 'editAnime');
