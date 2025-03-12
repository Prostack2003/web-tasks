<?php

namespace classes;

use Exception;
use PDO;

class Database
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO(
            'mysql:host=' . $_ENV['DB_CONNECTION'] . ';dbname=' . $_ENV['DB_DATABASE'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD']
        );
    }

    public function query(string $sql, array $params = []): array
    {
        $stmt = $this->db->prepare($sql);
        if ( !empty($params) ) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function prepare(string $sql)
    {
        return $this->db->prepare($sql);
    }
}