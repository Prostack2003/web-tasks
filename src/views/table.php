<?php

use classes\Database;

echo '<h1>' . "Table" . '</h1>';
$db = new Database();
$db->connect($_ENV['DB_CONNECTION'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
//
//$db->query('SELECT * FROM invoices');