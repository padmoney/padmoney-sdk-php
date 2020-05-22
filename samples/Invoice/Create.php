<?php

require_once "vendor/autoload.php";

$auth = [
    'token' => 'JDJhJDEwJHh0cGlWNU1vdXNjVjU1cXp0czdybi5adVVsRkJkTEpteDgwQkVTVXBiQkw5VWpaUVJESHVt',
    'token-secret' => '123',
];
$invoice = new \Padmoney\Invoice\Invoice($auth);

$params = [
];
$all = $invoice->list($params);

var_dump($all);
