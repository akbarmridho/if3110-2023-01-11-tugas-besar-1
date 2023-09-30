<?php

require_once "../Core/bootstrap.php";

$router = \Core\Router\Router::getRouter();

$router->handleRequest(new \Core\Http\Request());