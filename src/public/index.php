<?php

require '../../vendor/autoload.php';
use classes\Router;
use controllers\PageController;

$pageController = new PageController();


$router = new Router();
$router->addRoute('GET', '/home', [PageController::class, 'home']);
$router->addRoute('GET', '/register', [PageController::class, 'register']);
$router->addRoute('GET', '/login', [PageController::class, 'login']);

$router->dispatch();

echo "<pre>";
echo "</pre>";

