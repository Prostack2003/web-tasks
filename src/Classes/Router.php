<?php

namespace classes;


use containers\Container;

class Router
{
    private array $routes = [];
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function addRoute(string $method, string $url, array $handler): void
    {
        $this->routes[$method][$url] = $handler;
    }

    public function dispatch(): void
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

    private function callHandler(array $handler): void
    {
        [$className, $methodName] = $handler;

        $controller = $this->container->get($className);

        $controller->$methodName();
    }

    private function normalizeUri(string $uri): string
    {
        return rtrim($uri, '/');
    }
}