<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src/Entity'],
    isDevMode: true,
);


$connection = DriverManager::getConnection([
    'driver' => 'pdo_mysql',
    'dbname' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'host' => $_ENV['DB_HOST'],
], $config);


$entityManager = new EntityManager($connection, $config);

global $entityManager;
