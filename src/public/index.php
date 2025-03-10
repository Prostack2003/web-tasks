<?php

require '../../vendor/autoload.php';
use classes\Router;
use controllers\PageController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();


$pageController = new PageController();


$router = new Router();
$router->addRoute('GET', '/home', [PageController::class, 'home']);
$router->addRoute('GET', '/register', [PageController::class, 'register']);
$router->addRoute('GET', '/login', [PageController::class, 'login']);
$router->addRoute('GET', '/table', [PageController::class, 'table']);

$router->dispatch();



