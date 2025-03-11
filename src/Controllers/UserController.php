<?php

namespace controllers;

use classes\Database;

class UserController
{
    public function showActiveUsers(): array
    {
        $db = new Database();
        return $db->query("SELECT * FROM users WHERE is_active = 1");
    }

    public function addUser(
        string $email,
        string $fullName,
        bool $is_active,
        string $created_at
    ): array {
        $db = new Database();
        return $db->query(
            "INSERT INTO users (email, full_name, is_active, created_at)
                VALUES ('$email', '$fullName', '$is_active', '$created_at');"
        );
    }

    public function showMoneyUser(): array
    {
        $db = new Database();
        return $db->query("SELECT * FROM invoices");
    }
}