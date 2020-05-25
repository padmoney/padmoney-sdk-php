<?php

require_once "vendor/autoload.php";

$auth = [
    'token' => 'JDJhJDEwJEJwSXUycGY3ZGFvWFJ2dU5EVjF5eHVFanJlWUFCRUIuU1EzeVZqU3V0MzEzenFyR0gwTUxh',
    'token-secret' => '123',
];
$payer = new \Padmoney\Payer\Payer($auth);

$payerID = $payer->create([
    "name" => 'John Dee',
    "nickname" => 'John Dee',
    "cellPhone" => '27999999999',
    "document" => '27501555176',
    "address" => [
        "country" => 'BR',
        "state" => 'ES',
        "city" => 'Vitória',
        "neighborhood" => 'Jardim da Penha',
        "address" => 'Rua José Neves Cypreste',
        "number" => '400',
        "zipcode" => '29060300'
    ]
]);

var_dump($payerID);
