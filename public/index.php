<?php

// Register autoloader
require __DIR__ . '/../Core/Autoloader.php';

\Core\Autoloader::register();

\App\Hello::run();