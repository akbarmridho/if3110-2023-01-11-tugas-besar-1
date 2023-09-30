<?php

namespace Core\Router;

use Core\Http\MiddlewareInterface;
use Core\Http\RequestInterface;
use Exception;

class Pipeline
{
    protected array $middlewares = [];

    protected array $paramNames = [];

    protected string $regexMatch;

    public function __construct(protected string $pattern, protected string $controllerClass, protected string $controllerMethod)
    {
        $this->pattern = trim($this->pattern, "/");
        $this->regexMatch = preg_replace("/\{[a-zA-Z0-9]+}/", "([a-zA-Z0-9]+)", $this->pattern);
        $this->regexMatch = "/" . str_replace("/", "\/", $this->regexMatch) . "/i";

        // extract param names
        $paramMatches = [];

        preg_match_all("/\{[A-Za-z0-9]+}/i", $this->pattern, $paramMatches);

        foreach ($paramMatches[0] as $values) {
            $this->paramNames[] = substr($values, 1, -1);
        }
    }

    public function registerMiddlewares(array $middleware): void
    {
        $this->middlewares = $middleware;
    }

    public function isMatch(string $uri): bool
    {
        if ($this->pattern === "") {
            return $uri === $this->pattern;
        }

        $uri = trim($uri, "\\");

        $result = preg_match($this->regexMatch, $uri);

        if (is_numeric($result) && $result > 0) {
            return true;
        }

        return false;
    }

    /** Extract param
     *
     * @throws Exception
     */
    public function extractParam(string $uri): array
    {
        $uri = trim($uri, "\\");

        $paramMatches = [];

        preg_match_all($this->regexMatch, $uri, $paramMatches);

        array_shift($paramMatches);

        if (is_null($paramMatches)) {
            throw new Exception("Error when extracting params");
        }

        $result = [];

        for ($i = 0; $i < count($this->paramNames); $i++) {
            $result[$this->paramNames[$i]] = $paramMatches[$i][0];
        }

        return $result;
    }

    /** Run action on middlewares and controller
     * @throws Exception
     */
    public function run(RequestInterface $request)
    {
        $nextCalled = true;

        foreach ($this->middlewares as $middleware) {
            $nextCalled = false;

            $next = function () use (&$nextCalled) {
                $nextCalled = true;
            };

            $middlewareInstance = new $middleware;

            if (!method_exists($middlewareInstance, 'handle')) {
                throw new Exception('Middleware does not implement handle method');
            }

            $middlewareInstance->handle($request, $next);

            if (!$nextCalled) {
                break;
            }
        }

        if (!$nextCalled) {
            return;
        }

        $controllerInstance = new $this->controllerClass;

        if (!method_exists($controllerInstance, $this->controllerMethod)) {
            throw new Exception('Controller does not implement handle method');
        }

        $method = $this->controllerMethod;

        $controllerInstance->$method($request);
    }
}