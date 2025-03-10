<?php

use classes\Database;

echo '<h1>' . "Table" . '</h1>';

$db = new Database();
$db->connect($ENV_[''], 'testing', 'root', 'root');

$db->query('SELECT * FROM invoices');