<?php

// Register autoloader
require __DIR__ . '/Autoloader.php';

\Core\Autoloader::register();

// register helper function
require __DIR__ . '/helpers.php';

// start session
session_start();

// init router
\Core\Router\Router::setRouter(new \Core\Router\Router());

// register routes
require __DIR__ . '/../App/Routes/routes.php';

// bind required classes here
\Core\App::bind("config", require __DIR__ . '/config.php');
\Core\App::bind("database", new \Core\Database\Connection(\Core\Database\Connection::make(\Core\App::get("config")["database"])));
