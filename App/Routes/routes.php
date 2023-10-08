<?php

// Homepage
\Core\Router\Router::get("", [], \App\Http\Controller\AnimeController::class, 'index');

// Endpoint for ajax search request
\Core\Router\Router::get("search", [], \App\Http\Controller\AnimeController::class, 'search');

// add anime
\Core\Router\Router::get("admin/anime/add", [\App\Http\Middleware\Admin::class], \App\Http\Controller\AddAnimeController::class, 'addAnimeView');
\Core\Router\Router::post("admin/anime", [\App\Http\Middleware\Admin::class], \App\Http\Controller\AddAnimeController::class, 'addAnime');

// edit anime
\Core\Router\Router::get("admin/anime/{id}", [\App\Http\Middleware\Admin::class], \App\Http\Controller\EditAnimeController::class, 'editAnimeView');
\Core\Router\Router::put("admin/anime/{id}", [\App\Http\Middleware\Admin::class], \App\Http\Controller\EditAnimeController::class, 'editAnime');

// todo: delete anime

// Anime detail page
\Core\Router\Router::get('anime/{id}', [], \App\Http\Controller\AnimeController::class, 'view');

// Update profile
\Core\Router\Router::get('profile/edit', [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ProfileController::class, 'updateView');
\Core\Router\Router::put('profile/edit', [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ProfileController::class, 'update');
\Core\Router\Router::get('profile/password', [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ProfileController::class, 'passwordView');
\Core\Router\Router::put('profile/password', [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ProfileController::class, 'password');

// Profile detail page
\Core\Router\Router::get('profile/{id}', [], \App\Http\Controller\ProfileController::class, 'view');

// Auth Login logout
\Core\Router\Router::get("login", [\App\Http\Middleware\Guest::class], \App\Http\Controller\AuthController::class, 'loginView');
\Core\Router\Router::post("login", [\App\Http\Middleware\Guest::class], \App\Http\Controller\AuthController::class, 'login');
\Core\Router\Router::post("logout", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\AuthController::class, 'logout');

// Auth Register
\Core\Router\Router::get('register', [], \App\Http\Controller\AuthController::class, 'registerView');
\Core\Router\Router::post('register', [], \App\Http\Controller\AuthController::class, 'register');
