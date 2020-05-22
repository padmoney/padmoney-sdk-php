<?php

namespace Padmoney\Invoice;

interface InvoiceInterface extends \Padmoney\ClientInterface
{
    public function create(array $params = []);
    public function get(string $id);
    public function list(array $query);
}
