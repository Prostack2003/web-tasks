<?php

require 'vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\DBAL\DriverManager;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$ormConfig = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src/Entity'],
    isDevMode: true,
);

$connection = DriverManager::getConnection([
    'driver' => 'pdo_mysql',
    'dbname' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'host' => $_ENV['DB_HOST'],
], $ormConfig);

$entityManager = new EntityManager($connection, $ormConfig);

$migrationsConfig = new PhpFile('migrations.php');

return DependencyFactory::fromEntityManager(
    $migrationsConfig,
    new ExistingEntityManager($entityManager)
);