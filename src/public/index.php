<?php

require '../../vendor/autoload.php';
use classes\Router;
use controllers\PageController;
use controllers\UserController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();


$pageController = new PageController();
$userController = new UserController();
$activeUsers = $userController->showActiveUsers();
$moneyUsers = $userController->showMoneyUser();


$router = new Router();
$router->addRoute('GET', '/home', [PageController::class, 'home']);
$router->addRoute('GET', '/register', [PageController::class, 'register']);
$router->addRoute('GET', '/login', [PageController::class, 'login']);
$router->addRoute('GET', '/dashboard', [PageController::class, 'dashboard']);

$router->dispatch();



