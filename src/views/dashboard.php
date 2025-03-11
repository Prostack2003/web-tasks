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
    </style>
</head>
<body>
<div class="container">
    <h1>Панель управления</h1>
    <div class="card">
        <h2>Активные пользователи</h2>
        <p>Количество: <span class="highlight"></span></p>
        <ul>
        </ul>
    </div>
    <div class="card">
        <h2>Общая сумма счетов</h2>
        <p>Сумма: <span class="highlight"></span></p>
    </div>
</div>
</body>
</html>