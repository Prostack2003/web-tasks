<?php

declare(strict_types=1);

use models\Invoice;

require_once 'vendor/autoload.php';
require __DIR__.'/../../eloquent.php';

$invoice = new Invoice();
$invoice->customer_name = 'John Doe';
$invoice->total_amount = 100.50;
$invoice->save();