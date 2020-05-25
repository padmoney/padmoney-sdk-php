<?php

require_once "vendor/autoload.php";

$auth = [
    'token' => 'JDJhJDEwJEJwSXUycGY3ZGFvWFJ2dU5EVjF5eHVFanJlWUFCRUIuU1EzeVZqU3V0MzEzenFyR0gwTUxh',
    'token-secret' => '123',
];
$payer = new \Padmoney\Payer\Payer($auth);

$payers = $payer->list([
    "page" => 1,
    "perPage" => 10,
    "q" => 'John'
]);

var_dump($payers);
