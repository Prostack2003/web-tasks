<?php

namespace classes;

class Router
{
    public function __construct(
        public string $currentUrl,
        public array $routes,
    )
    {
        $this->currentUrl = $_SERVER['REQUEST_URI'];
        $this->routes = [];
    }

    public function getCurrentUrl(): string
    {
        return $this->currentUrl;
    }

    public function addRoute($method, $path) : void
    {
        $this->routes[$method] = $path;
    }
}