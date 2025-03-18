<?php

require '../../vendor/autoload.php';

use classes\Router;
use controllers\CurlController;
use controllers\PageController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();


$pageController = new PageController();

$router = new Router();
$router->addRoute('GET', '/home', [PageController::class, 'home']);
$router->addRoute('GET', '/register', [PageController::class, 'register']);
$router->addRoute('GET', '/login', [PageController::class, 'login']);
$router->addRoute('GET', '/dashboard', [PageController::class, 'dashboard']);
$router->addRoute('POST', '/dashboard', [PageController::class, 'dashboard']);
$router->addRoute('GET', '/curl', [CurlController::class, 'index']);


$router->dispatch();
