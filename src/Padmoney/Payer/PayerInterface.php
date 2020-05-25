<?php

namespace Padmoney\Payer;


interface PayerInterface
{
    public function create(array $params): string;
}
