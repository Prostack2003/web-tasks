<?php

global $entityManager;
require __DIR__ . '/../../bootstrap.php';
global $activeUsers, $moneyUsers;

use controllers\UserController;

$userController = new UserController($entityManager);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    $fullName = $_POST['full_name'];
    $isActive = (bool)$_POST['is_active'];

    $userController->addUser($email, $fullName, $isActive);

    header('Location: /dashboard');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $userId = (int)$_POST['user_id'];
    $userController->deleteUser($userId);

    header('Location: /dashboard');
    exit;
}

$activeUsers = $userController->showUsers();
$moneyUsers = $userController->showMoneyUser();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управления</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4a90e2;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        h2 {
            color: #4a90e2;
            margin-top: 0;
        }

        .highlight {
            color: #e94e77;
            font-weight: bold;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background: #f9f9f9;
            margin: 5px 0;
            padding: 10px;
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus,
        .form-group select:focus {
            border-color: #4a90e2;
            outline: none;
        }

        .form-group .checkbox-group {
            display: flex;
            align-items: center;
        }

        .form-group .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
        }

        .form-group button {
            background-color: #4a90e2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #357abd;
        }

        .user-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .delete-form {
            margin-left: 15px;
        }

        .delete-btn {
            background-color: #e94e77;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #cc445f;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Панель управления</h1>
    <div class="card">
        <h2>Добавление пользователей</h2>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="full_name">ФИО:</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="is_active">Активен:</label>
                <select id="is_active" name="is_active" required>
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Добавить пользователя</button>
            </div>
        </form>
    </div>

    <div class="card">
        <h2>Пользователи</h2>
        <p>Количество: <span class="highlight"><?= count($activeUsers) ?></span></p>
        <ul>
            <?php foreach ($activeUsers as $user): ?>
                <li class="user-item">
                    <div>
                        <?= $user->getFullName() ?>
                        (<?= $user->getEmail() ?>)
                    </div>
                    <form class="delete-form" method="POST">
                        <input type="hidden" name="user_id" value="<?= $user->getId() ?>">
                        <button type="submit" class="delete-btn">Удалить</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="card">
        <h2>Общая сумма счетов</h2>
        <p>Сумма:
            <span class="highlight">
        <?php
        if (empty($moneyUsers)) {
            echo "Нет данных о пользователях.";
        } else {
            $result = 0;
            foreach ($moneyUsers as $user) {
                $result += (float) $user->getAmount();
            }
            echo number_format($result, 2, '.', ' ');
        }
        ?>
    </span>
        </p>
    </div>
    <div class="card">
        <h2 style="text-align: center">
            <a style="color: #4a90e2; text-decoration: none" href="/home">Вернуться обратно на главную</a>
        </h2>
    </div>
</div>
</body>
</html>