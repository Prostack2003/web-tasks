<?php

namespace classes;

class Router
{
    private array $routes = [];

    public function addRoute($method, $url, $handler): void
    {
        $this->routes[$method][$url] = $handler;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $this->normalizeUri($_SERVER['REQUEST_URI']);

        if (isset($this->routes[$method][$uri])) {
            $handler = $this->routes[$method][$uri];
            $this->callHandler($handler);
        } else {
            http_response_code(404);
            echo "Страница не найдена";
        }
    }

    private function callHandler($handler)
    {
        if (is_array($handler)) {
            [$className, $methodName] = $handler;
            $controller = new $className();
            $controller->$methodName();
        } elseif (is_callable($handler)) {
            $handler();
        }
    }

    private function normalizeUri($uri)
    {
        return rtrim($uri, '/');
    }
}