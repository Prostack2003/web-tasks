<?php

namespace classes;

use PDO;

class Database
{
    public function connect($host, $dbName, $user, $password): string
    {
        try {
            new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
        } catch (\Exception $error) {
            $errorMessage = $error->getMessage();
            echo $errorMessage;
        }
    }
}
