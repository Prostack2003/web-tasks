<?php

require '../../vendor/autoload.php';

use classes\Router;
use containers\Container;
use controllers\CurlController;
use controllers\PageController;
use services\EmailValidationService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

$container = new Container();
$container->set(EmailValidationService::class, function () {
    $api_key = $_ENV['EMAILABLE_API_KEY'];
    return new EmailValidationService($api_key);
});

$container->set(CurlController::class, function (Container $c) {
    return new CurlController($c->get(EmailValidationService::class));
});

$pageController = new PageController();

$router = new Router($container);
$router->addRoute('GET', '/home', [PageController::class, 'home']);
$router->addRoute('GET', '/register', [PageController::class, 'register']);
$router->addRoute('GET', '/login', [PageController::class, 'login']);
$router->addRoute('GET', '/dashboard', [PageController::class, 'dashboard']);
$router->addRoute('POST', '/dashboard', [PageController::class, 'dashboard']);
$router->addRoute('GET', '/curl', [CurlController::class, 'index']);


$router->dispatch();
