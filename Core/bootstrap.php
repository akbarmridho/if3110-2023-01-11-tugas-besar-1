<?php

// Register autoloader
require __DIR__ . '/Autoloader.php';

\Core\Autoloader::register();

// register helper function
require __DIR__ . '/helpers.php';

// init router
\Core\Router\Router::setRouter(new \Core\Router\Router());

// register routes
require __DIR__ . '/../App/Routes/routes.php';

// bind required classes here