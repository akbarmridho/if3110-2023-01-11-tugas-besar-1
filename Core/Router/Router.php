<?php

namespace Core\Router;

use Core\Http\Request;
use Core\Http\RequestInterface;
use Core\Http\Response;
use Exception;

class Router
{
    protected static Router $router;

    public static function setRouter(Router $router): void
    {
        static::$router = $router;
    }

    public static function getRouter(): Router
    {
        return static::$router;
    }

    protected array $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => []
    ];

    /**
     * @throws Exception
     */
    public function handleRequest(RequestInterface $request)
    {
        $method = Request::method();
        $uri = Request::uri();

        $methodRoutes = $this->routes[$method];

        $found = false;
        $i = 0;

        while (!$found && $i < count($methodRoutes)) {
            $pipeline = $methodRoutes[$i];

            if (!$pipeline instanceof Pipeline) {
                throw new Exception("Method route is not an instance of Pipeline");
            }

            if ($pipeline->isMatch($uri)) {
                $found = true;

                $params = $pipeline->extractParam($uri);
                $request->setRouteParam($params);

                $pipeline->run($request);
            } else {
                $i++;
            }
        }

        if (!$found) {
            Response::status(404);
            render('404');
        }
    }

    protected static function registerRoute(string $method, string $pattern, array $middlewares, string $controllerClass, string $controllerMethod)
    {
        $router = static::$router;

        $pipeline = new Pipeline($pattern, $controllerClass, $controllerMethod);

        $pipeline->registerMiddlewares($middlewares);

        $router->routes[$method][] = $pipeline;
    }

    public static function get(string $pattern, array $middlewares, string $controllerClass, string $controllerMethod)
    {
        static::registerRoute("GET", $pattern, $middlewares, $controllerClass, $controllerMethod);
    }

    public static function put(string $pattern, array $middlewares, string $controllerClass, string $controllerMethod)
    {
        static::registerRoute("PUT", $pattern, $middlewares, $controllerClass, $controllerMethod);
    }

    public static function post(string $pattern, array $middlewares, string $controllerClass, string $controllerMethod)
    {
        static::registerRoute("POST", $pattern, $middlewares, $controllerClass, $controllerMethod);
    }

    public static function delete(string $pattern, array $middlewares, string $controllerClass, string $controllerMethod)
    {
        static::registerRoute("DELETE", $pattern, $middlewares, $controllerClass, $controllerMethod);
    }
}