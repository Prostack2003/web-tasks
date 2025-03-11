<?php

global $activeUsers, $moneyUsers;
use controllers\UserController;

// TODO сделать добавление пользователя
//if (isset($_POST['email']) && isset($_POST['fullName']) && isset($_POST['isActive'])) {
//    $form = $_POST;
//    $email = $form['email'];
//    $fullName = $form['fullName'];
//    $isActive = $form['isActive'];
//
//    $userController = new UserController();
//    $userController->addUser($email, $fullName, $isActive, '2025-03-11 15:37:15');
//}

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
                <label for="fullName">ФИО:</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="isActive">Активен:</label>
                <select id="isActive" name="isActive" required>
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
        <h2>Активные пользователи</h2>
        <p>Количество: <span class="highlight"><?= count($activeUsers) ?></span></p>
        <ul>
            <?php foreach ($activeUsers as $user): ?>
                <li><?= $user['full_name'] ?> (<?= $user['email'] ?>)</li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="card">
        <h2>Общая сумма счетов</h2>
        <p>Сумма:
            <span class="highlight">
                <?php
                    $result = 0;
                    foreach ($moneyUsers as $user) {
                        $result += $user['amount'];
                    }
                    echo $result
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