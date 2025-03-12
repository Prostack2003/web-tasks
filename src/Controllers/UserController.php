<?php

namespace controllers;

use classes\Database;

class UserController
{
    public function showUsers(): array
    {
        $db = new Database();
        return $db->query("SELECT * FROM users");
    }

    public function addUser(string $email, string $fullName, bool $is_active): bool
    {
        $db = new Database();
        $stmt = $db->prepare(
            "INSERT INTO users (email, full_name, is_active, created_at)\n" .
            "VALUES (?, ?, ?, NOW())"
        );
        return $stmt->execute([
            $email,
            $fullName,
            $is_active ? 1 : 0,
        ]);
    }

    public function deleteUser(int $userId): bool
    {
        $db = new Database();
        $stmt = $db->prepare(
            'DELETE FROM users WHERE id = :id'
        );
        return $stmt->execute([
            'id' => $userId,
        ]);
    }

    public function showMoneyUser(): array
    {
        $db = new Database();
        return $db->query("SELECT * FROM invoices");
    }
}